<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <!-- App title -->
    <title>Administrator | Dashboard</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="./assets/vendors/fontawesome/css/all.min.css">
    <!-- Line Awesome -->
    <link rel="stylesheet" href="./assets/vendors/lineawesome/css/line-awesome.min.css">
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <!-- Metis Menu -->
    <link rel="stylesheet" href="./assets/vendors/metis-menu/css/metis-menu.min.css">
    <!-- Apex Chart -->
    <!-- date ranger -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- Input Tags -->
    <link rel="stylesheet" href="./assets/vendors/inputtags/tagsinput.css">
    <!-- Line Icons -->
    <link rel="stylesheet" href="./assets/vendors/lineicons/lineicons.css">
    <!-- RTL -->
    <link rel="stylesheet" href="./assets/vendors/rtlcss/css/semantic.rtl.min.css">
    <!-- Swwet alert -->
    <link rel="stylesheet" href="./assets/vendors/sweet-alert/css/sweet-alert.min.css">
    <!-- select2 -->
    <link rel="stylesheet" href="./assets/vendors/select2/css/select2.min.css">
    <!-- toastr -->
    <link rel="stylesheet" href="./assets/css/toastr.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/daterangepicker.css">
    <link rel="stylesheet" href="./assets/backend/css/c-ui.css">
    <link rel="stylesheet" href="assets/backend/css/style2.css">
</head>

<body class="fixed-left">

    <div id="layout-wrapper">

        <!-- Header -->
        <header class="header">
            <?php include('includes/header.php');?>
        </header>
        <!-- End Header -->

        <!-- Left Sidebar  -->
        <aside class="sidebar" id="sidebar">
            <?php include('includes/sidebar.php');?>
        </aside>

        <!-- Start right Content  -->
        <div class="content-page">
            <!-- Content -->
            <div class="content">
                <!-- Container -->
                <div class="container">

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Dashboard</h4>
                                <ol class="breadcrumb p-0 m-0">

                                    <li>
                                        <a href="#">Admin</a>
                                    </li>
                                    <li class="active">
                                        Dashboard
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <a href="manage-student.php">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow">Học sinh</p>
                                        <?php $query=mysqli_query($con,"select * from hocsinh where active=1");
$counths=mysqli_num_rows($query);
?>

                                        <h2><?php echo htmlentities($counths);?> <small></small></h2>

                                    </div>
                                </div>
                            </div>
                        </a><!-- end col -->
                        <a href="manage-teacher.php">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow">Giáo viên
                                        </p>
                                        <?php $query=mysqli_query($con,"select * from giaovien where active=1");
$countgv=mysqli_num_rows($query);
?>
                                        <h2><?php echo htmlentities($countgv);?> <small></small></h2>

                                    </div>
                                </div>
                            </div><!-- end col -->
                        </a>

                        <a href="class.php">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-layers widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow">Lớp</p>
                                        <?php $query=mysqli_query($con,"select * from lophoc");
$countclass=mysqli_num_rows($query);
?>
                                        <h2><?php echo htmlentities($countclass);?> <small></small></h2>

                                    </div>
                                </div>
                            </div><!-- end col -->
                        </a>


                    </div>
                    <!-- end row -->

                    <div class="row">
                        <a href="subject.php">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-layers widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow"
                                            title="User This Month">Bộ môn</p>
                                        <?php $query=mysqli_query($con,"select * from monhoc");
$countsubj=mysqli_num_rows($query);
?>

                                        <h2><?php echo htmlentities($countsubj);?> <small></small></h2>

                                    </div>
                                </div>
                            </div>
                        </a><!-- end col -->
                        <a href="manage-news.php">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-layers widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow"
                                            title="User This Month">Tin tức</p>
                                        <?php $query=mysqli_query($con,"select * from news");
$countnews=mysqli_num_rows($query);
?>
                                        <h2><?php echo htmlentities($countnews);?> <small></small></h2>

                                    </div>
                                </div>
                            </div><!-- end col -->
                        </a>

                        <a href="timetable.php">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-layers widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow"
                                            title="User This Month">Thời khoá biểu</p>
                                        <?php $query=mysqli_query($con,"select * from tblposts where Is_Active=1");
$countposts=mysqli_num_rows($query);
?>
                                        <h2><?php echo htmlentities($countposts);?> <small></small></h2>

                                    </div>
                                </div>
                            </div><!-- end col -->
                        </a>


                    </div>
                    <!-- end row -->
                </div> <!-- container -->

            </div> <!-- content -->
            <?php include('includes/footer.php');?>

        </div>

    </div>
    <!-- END wrapper -->



    <script>
    var isRTL = 0;
    </script>
    <script src="./assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <!--  Bootstrap 5 -->
    <script src="./assets/vendors/bootstrap/js/popper.min.js"></script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <!-- RTL -->
    <script src="./assets/vendors/rtlcss/js/semantic.min.js"></script>
    <!-- Metis Menu -->
    <script src="./assets/vendors/metis-menu/js/metis-menu.min.js"></script>
    <!-- date ranger -->
    <script src="./assets/vendors/daterangepicker/js/moment.min.js"></script>
    <script src="./assets/vendors/daterangepicker/js/daterangepicker.min.js"></script>
    <!-- Swwet alert -->
    <script src="./assets/vendors/sweet-alert/js/sweetalert2@11.min.js"></script>
    <script src="./assets/vendors/select2/js/select2.min.js"></script>

    <script src="./assets/backendjs/jquery-ui.js"></script>

    <script src="./assets/js/toastr.js"></script>
    <script type="text/javascript"></script>


    <script src="./assets/js/tooltip.js"></script>
    <script src="./assets/js/newmain.js"></script>
    <script src="./assets/js/theme.js" async></script>
    <!-- Input Tags -->
    <script src="./assets/vendors/inputtags/tagsinput.js"></script>
    <script src="./assets/backendjs/main.js"></script>
    <script src="./assets/js/select2-init.js"></script>

    <script src="./assets/js/axios.js"></script>

    <!-- Table -->
    <script src="./assets/backend/js/table/data-table.js"></script>

    <script src="./assets/backendjs/fs_d_ecma/chart/echarts.min.js"></script>
    <script type="module" src="./assets/backend/js/fs_d_ecma/components/dashboard.js"></script>
    <script src="./assets/backend/js/backend_common.js"></script>
    <script src="./assets/backend/js/__app.script.js"></script>


</body>

</html>
<?php } ?>