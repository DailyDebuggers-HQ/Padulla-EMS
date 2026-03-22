<?php
require_once __DIR__ . '/config/db.php';

// Fix script to make sure students have ALL their prior semesters enrolled (1st AND 2nd)
echo "Fixing student histories to include 2nd semesters and generating realistic past data...\n";

// Only run on students where we know they are upper years
$stmt = $pdo->query("SELECT * FROM students");
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pdo->beginTransaction();

try {
    foreach ($students as $st) {
        $sid = $st['student_id'];
        $pid = $st['program_id'];
        $currentYearLevel = (int)$st['current_year_level'];
        
        for ($yl = 1; $yl <= $currentYearLevel; $yl++) {
            // calculate the past academic year based on year level
            $offset = $currentYearLevel - $yl;
            $base_yr = 2025 - $offset; 
            $ay = $base_yr . '-' . ($base_yr + 1);
            
            // For each year, assure both 1st and 2nd semesters exist
            foreach (['1st', '2nd'] as $sem) {
                // Check if already exists
                $chk = $pdo->prepare("SELECT enrollment_id FROM enrollments WHERE student_id = ? AND academic_year = ? AND semester = ?");
                $chk->execute([$sid, $ay, $sem]);
                $exists = $chk->fetch();
                
                if (!$exists) {
                    echo "Adding $yl Year, $sem Semester for $sid ($ay)\n";
                    
                    // Fetch curriculum for this year level and semester
                    $curr = $pdo->prepare("SELECT course_id FROM curriculum WHERE program_id = ? AND year_level = ? AND semester = ?");
                    $curr->execute([$pid, $yl, $sem]);
                    $subs = $curr->fetchAll();
                    
                    if (empty($subs)) continue; // skip if program has no subjects for this semester (rare)
                    
                    // calculate past enrollment date
                    $enrMonth = ($sem == '1st') ? '-08-15' : '-01-15';
                    $enrYear = ($sem == '1st') ? $base_yr : $base_yr + 1;
                    $enrDate = $enrYear . $enrMonth . ' 10:00:00';
                    
                    // Create enrollment record
                    $enr = $pdo->prepare("INSERT INTO enrollments (student_id, academic_year, semester, total_units, status, enrollment_date) VALUES (?, ?, ?, ?, ?, ?)");
                    $enr->execute([$sid, $ay, $sem, 0, 'Enrolled', $enrDate]);
                    $enrId = $pdo->lastInsertId();
                    
                    $totalUnits = 0;
                    
                    // Enroll subjects
                    foreach ($subs as $sub) {
                        $cid = $sub['course_id'];
                        // Find a dummy schedule for this subject and term
                        $sch = $pdo->prepare("SELECT schedule_id FROM schedules WHERE course_id = ? LIMIT 1");
                        $sch->execute([$cid]);
                        $schRow = $sch->fetch();
                        
                        if ($schRow) {
                            $pdo->prepare("INSERT INTO enrollment_schedules (enrollment_id, schedule_id) VALUES (?, ?)")
                                ->execute([$enrId, $schRow['schedule_id']]);
                            
                            $crs = $pdo->prepare("SELECT total_units FROM courses WHERE course_id = ?");
                            $crs->execute([$cid]);
                            $totalUnits += $crs->fetchColumn();
                        }
                    }
                    
                    // calculate realistic payments
                    $assessedAmount = ($totalUnits * 750) + 3000;
                    
                    $pdo->prepare("UPDATE enrollments SET total_units = ?, assessed_amount = ? WHERE enrollment_id = ?")
                        ->execute([$totalUnits, $assessedAmount, $enrId]);
                    
                    // Fast insert payment history (Fully Paid since it's in the past)
                    $payDate = date('Y-m-d H:i:s', strtotime($enrDate . ' + 10 days'));
                    $pdo->prepare("INSERT INTO payments (student_id, enrollment_id, or_number, amount, payment_date, remarks) VALUES (?, ?, ?, ?, ?, ?)")
                        ->execute([$sid, $enrId, 'OR-'.rand(100000, 999999), $assessedAmount, $payDate, 'Full Payment']);
                }
            }
        }
    }
    
    $pdo->commit();
    echo "2nd semesters successfully generated!\n";
} catch (Exception $e) {
    $pdo->rollBack();
    echo "Error filling missing semesters: " . $e->getMessage() . "\n";
}
