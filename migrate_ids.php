<?php
require_once __DIR__ . '/config/db.php';

echo "Migrating Student IDs...\n";
$pdo->exec("SET FOREIGN_KEY_CHECKS = 0;");

$stmt = $pdo->query("SELECT student_id FROM students ORDER BY student_id ASC");
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

$counters = [];

$pdo->beginTransaction();
try {
    foreach ($students as $st) {
        $old_id = $st['student_id'];
        
        // Extract year from old ID (assuming format YYYY-XXX)
        $parts = explode('-', $old_id);
        $year = isset($parts[0]) && is_numeric($parts[0]) ? $parts[0] : date('Y');
        
        if (!isset($counters[$year])) {
            $counters[$year] = 1;
        }
        
        $seq = str_pad($counters[$year], 4, '0', STR_PAD_LEFT);
        $new_id = "UAA-{$year}-{$seq}";
        $counters[$year]++;
        
        echo "Updating $old_id to $new_id\n";
        
        $pdo->prepare("UPDATE students SET student_id = ? WHERE student_id = ?")->execute([$new_id, $old_id]);
        $pdo->prepare("UPDATE enrollments SET student_id = ? WHERE student_id = ?")->execute([$new_id, $old_id]);
        $pdo->prepare("UPDATE payments SET student_id = ? WHERE student_id = ?")->execute([$new_id, $old_id]);
    }
    
    $pdo->commit();
    echo "Migration complete!\n";
} catch (Exception $e) {
    $pdo->rollBack();
    echo "Error: " . $e->getMessage() . "\n";
}

$pdo->exec("SET FOREIGN_KEY_CHECKS = 1;");
?>