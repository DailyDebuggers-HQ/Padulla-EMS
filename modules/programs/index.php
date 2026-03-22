<?php
// modules/programs/index.php
// Programs listing and quick view
require_once '../../config/db.php';
include_once '../../includes/header.php';

$stmt = $pdo->query("SELECT * FROM programs ORDER BY program_code");
$programs = $stmt->fetchAll();
?>

<div class="row mb-3">
    <div class="col-md-8">
        <h2><i class="fas fa-book-reader text-primary"></i> Academic Programs</h2>
        <p class="text-muted">Manage available programs and their respective curriculum.</p>
    </div>
    <div class="col-md-4 text-end">
        <button class="btn btn-success"><i class="fas fa-plus"></i> New Program</button>
    </div>
</div>

<div class="row">
    <?php foreach($programs as $prog): ?>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-start border-primary border-4">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-primary"><?= htmlspecialchars($prog['program_code']) ?></h5>
                    <p class="card-text text-muted mb-2"><?= htmlspecialchars($prog['program_name']) ?></p>
                    <small class="text-secondary d-block mb-3">Dept: <?= htmlspecialchars($prog['department'] ?? 'General') ?></small>
                    <a href="view.php?id=<?= $prog['program_id'] ?>" class="btn btn-outline-primary btn-sm w-100">
                        <i class="fas fa-sitemap"></i> View Curriculum
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    
    <?php if(count($programs) == 0): ?>
        <div class="col-12"><div class="alert alert-info">No programs defined yet in the `programs` table.</div></div>
    <?php endif; ?>
</div>

<?php include_once '../../includes/footer.php'; ?>