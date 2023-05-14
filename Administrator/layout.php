<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:login.php');
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
    <title>Administrator | <?php echo isset($subTitle) ? $subTitle : $title ?></title>

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
    <!-- Data table -->
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/daterangepicker.css">
    <link rel="stylesheet" href="./assets/backend/css/c-ui.css">
    <link rel="stylesheet" href="./assets/backend/css/style2.css">
</head>

<body class="fixed-left">

    <div id="layout-wrapper">

        <header class="header">
            <?php include('includes/header.php');?>
        </header>

        <aside class="sidebar" id="sidebar">
            <?php include('includes/sidebar.php');?>
        </aside>

        <main class="main-content">
            <div class="page-content ph-32 pt-100">
                <div class="breadcrumb-warning d-flex justify-content-between ot-card">
                    <div>
                        <h3><?php echo isset($subTitle) ? $subTitle : $title ?></h3>
                    </div>
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb ot-breadcrumb ot-breadcrumb-basic">
                            <li class="breadcrumb-item ">
                                <a href="#">Dashboard </a>
                            </li>
                            <?php if(isset($title)) :  ?>
                            <li class="breadcrumb-item active">
                                <?php echo $title?>
                            </li>
                            <?php endif ?>
                            <?php if(isset($subTitle)) :  ?>
                            <li class="breadcrumb-item active">
                                <?php echo $subTitle?>
                            </li>
                            <?php endif ?>
                        </ol>
                    </nav>
                </div>
                <?php echo $content; ?>
            </div>
            <?php include('includes/footer.php');?>
        </main>


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

    <script type="text/javascript" language="javascript" src="./assets/vendors/ckeditor/ckeditor.js"></script>

    <!-- Table -->
    <!-- <script src="./assets/backend/js/table/data-table.js"></script> -->
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>

    <!-- Sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="./assets/backendjs/fs_d_ecma/chart/echarts.min.js"></script>
    <script type="module" src="./assets/backend/js/fs_d_ecma/components/dashboard.js"></script>
    <script src="./assets/backend/js/backend_common.js"></script>
    <script src="./assets/backend/js/__app.script.js"></script>


</body>

</html>
<?php } ?>