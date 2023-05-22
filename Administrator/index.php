<?php
ob_start();
include('includes/config.php');
?>

<div class="content">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-3 col-xl-3 pb-24">
            <div class="card summery-card ot-card h-100">
                <div class="card-heading d-flex align-items-center">
                    <div class="card-icon circle-primary dashboard-card-icon">
                        <i class="fa fa-user d-inline-block"></i>
                    </div>
                    <div class="card-content">
                        <h4 style="color:#337ab7">Total Student</h4>
                        <?php $query=$con->prepare("SELECT * FROM students");
                            $query->execute();
                            $num_rows = $query->rowCount();
                        ?>
                        <h1> <?php echo $num_rows; ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3 col-xl-3 pb-24">
            <div class="card summery-card ot-card h-100">
                <div class="card-heading d-flex align-items-center">
                    <div class="card-icon circle-warning dashboard-card-icon">
                        <i class="fa fa-graduation-cap d-inline-block"></i>
                    </div>
                    <div class="card-content">
                        <h4 style="color:#337ab7">Total Teacher</h4>
                        <?php $query=$con->prepare("SELECT * FROM teachers");
                            $query->execute();
                            $num_rows = $query->rowCount();
                        ?>
                        <h1> <?php echo $num_rows; ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3 col-xl-3 pb-24">
            <div class="card summery-card ot-card h-100">
                <div class="card-heading d-flex align-items-center">
                    <div class="card-icon circle-success dashboard-card-icon">
                        <i class="fa fa-cubes d-inline-block"></i>
                    </div>
                    <div class="card-content">
                        <h4 style="color:#337ab7">Total Classroom</h4>
                        <?php $query=$con->prepare("SELECT * FROM classrooms");
                            $query->execute();
                            $num_rows = $query->rowCount();
                        ?>
                        <h1> <?php echo $num_rows; ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3 col-xl-3 pb-24">
            <div class="card summery-card ot-card h-100">
                <div class="card-heading d-flex align-items-center">
                    <div class="card-icon circle-danger dashboard-card-icon">
                        <i class="fa fa-newspaper d-inline-block"></i>
                    </div>
                    <div class="card-content">
                        <h4 style="color:#337ab7">Total News</h4>
                        <?php $query=$con->prepare("SELECT * FROM news");
                            $query->execute();
                            $num_rows = $query->rowCount();
                        ?>
                        <h1> <?php echo $num_rows; ?></h1>
                        <h1></h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 pb-24 pl-12 pr-12">
            <div class="card statistic-card ot-card">
                <div class="card-header d-flex flex-row justify-content-between align-items-baseline">
                    <div class="card-title">
                        <h3>Revenue</h3>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div id="revenueChart" class="custom-chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/backend/js/fs_d_ecma/chart/echarts.min.js"></script>
<script src="assets/backend/js/fs_d_ecma/components/dashboard.js"></script>
<?php
$title = "Home";
$content = ob_get_clean();
require 'layout.php';
?>