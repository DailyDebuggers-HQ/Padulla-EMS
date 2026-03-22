<?php
require_once 'config/db.php';
// 1. Update all existing schedules to section_code = 'X'
$pdo->query("UPDATE schedules SET section_code = 'X'");

$stmt = $pdo->query("SELECT * FROM schedules WHERE section_code = 'X'");
$schedules = $stmt->fetchAll(PDO::FETCH_ASSOC);

$insert = $pdo->prepare("INSERT INTO schedules (course_id, academic_year, semester, teacher_id, days, time_start, time_end, room, capacity, enrolled_count, section_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Y')");

foreach($schedules as $s) {
    // Generate different days or time for Y if needed, but for now exact same just diff room
    $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'];
    $randDay = $days[array_rand($days)];
    $insert->execute([
        $s['course_id'], $s['academic_year'], $s['semester'], $s['teacher_id'],
        $randDay, $s['time_start'], $s['time_end'], 'RM-'.rand(100,500), 40, 0
    ]);
}
echo "Schedules duplicated for Section Y successfully!";
?>