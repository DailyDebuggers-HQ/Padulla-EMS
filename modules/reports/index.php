<?php
// modules/reports/index.php
// Placeholder for Reports module
require_once '../../config/db.php';
include_once '../../includes/header.php';
?>

<div class="row mb-3">
    <div class="col-md-12">
        <h2><i class="fas fa-chart-bar text-primary"></i> System Reports</h2>
        <p class="text-muted">Extract data regarding enrollment mapping and financial revenue.</p>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card shadow-sm text-center mb-3">
            <div class="card-body py-4">
                <i class="fas fa-user-check fa-4x text-success mb-3"></i>
                <h5>Enrollment Summary</h5>
                <p class="text-muted">Total students grouped by Year Level and Academic Programs.</p>
                <button class="btn btn-outline-success">Generate Report</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card shadow-sm text-center mb-3">
            <div class="card-body py-4">
                <i class="fas fa-money-check-alt fa-4x text-info mb-3"></i>
                <h5>Financial Collection</h5>
                <p class="text-muted">Collection from processed payments, categorized by Date or Term.</p>
                <button class="btn btn-outline-info">Generate Report</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card shadow-sm text-center mb-3">
            <div class="card-body py-4">
                <i class="fas fa-chalkboard-teacher fa-4x text-warning mb-3"></i>
                <h5>Schedule Capacities</h5>
                <p class="text-muted">Analyze class sections, teaching loads, and identifying overcapacity issues.</p>
                <button class="btn btn-outline-warning">Generate Report</button>
            </div>
        </div>
    </div>
</div>

<?php include_once '../../includes/footer.php'; ?>