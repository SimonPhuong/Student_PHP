<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if($_GET['action']=='del' && $_GET['rid'])
{
	$id=intval($_GET['rid']);
	$query=mysqli_query($con,"update giaovien set active='0' where id='$id'");
	$msg="Đã chuyển đến thùng rác!";
}
// Code for restore
if($_GET['resid'])
{
	$id=intval($_GET['resid']);
	$query=mysqli_query($con,"update giaovien set active='1' where id='$id'");
	$msg="Khôi phục thành công!";
}

// Code for Forever deletionparmdel
if($_GET['action']=='parmdel' && $_GET['rid'])
{
	$id=intval($_GET['rid']);
	$query=mysqli_query($con,"delete from  giaovien  where id='$id'");
	$delmsg="Đã xoá vĩnh viễn!";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Giáo viên | Danh sách giáo viên</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="plugins/switchery/switchery.min.css">
    <script src="assets/js/modernizr.min.js"></script>

</head>
<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

    <!-- Header -->
    <?php include('includes/topheader.php');?>

    <!-- Left Sidebar -->
    <?php include('includes/leftsidebar.php');?>

    <!-- ======= Start content ======= -->
    <div class="content-page">
        <div class="content">
            <div class="container">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Danh sách giáo viên</h4>
                            <ol class="breadcrumb p-0 m-0">
                                <li>
                                    Admin
                                </li>
                                <li>
                                    Giáo viên 
                                </li>
                                <li class="active">
                                    Danh sách giáo viên
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-sm-6">  

<?php if($msg){ ?>
<div class="alert alert-success" role="alert">
<strong>Well done!</strong> <?php echo htmlentities($msg);?>
</div>
<?php } ?>

<?php if($delmsg){ ?>
<div class="alert alert-danger" role="alert">
<strong>Oh snap!</strong> <?php echo htmlentities($delmsg);?></div>
<?php } ?>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="demo-box m-t-20">
                                <div class="m-b-30">
                                    <a href="#">
                                    <button id="addToTable" class="btn btn-success waves-effect waves-light">Thêm <i class="mdi mdi-plus-circle-outline" ></i></button>
                                    </a>
                                </div>

                                <!-- Table Strart -->
                                <div class="table-responsive">
                                    <table class="table m-0 table-colored-bordered table-bordered-primary">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Họ tên</th>
                                                <th>Bộ môn</th>
                                                <th>Trình độ</th>
                                                <th>Số điện thoại</th>
                                                <th>Email</th>
                                                <th>Tuỳ chỉnh</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php 
$query=mysqli_query($con,"Select malichday, magiaovien, hoten, gioitinh, diachi, sdt, email, kinhnghiem, bomon, trinhdo, ngaysinh, socmnd, dantoc, tongiao, noisinh, hinh, mabomon, active from giaovien where active=1");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

                                            <tr>
                                            <th scope="row"><?php echo htmlentities($cnt);?></th>
                                            <td><?php echo htmlentities($row['hoten']);?></td>
                                            <td><?php echo htmlentities($row['bomon']);?></td>
                                            <td><?php echo htmlentities($row['chucvu']);?></td>
                                            <td><?php echo htmlentities($row['sdt']);?></td>
                                            <td><?php echo htmlentities($row['email']);?></td>
                                            <td><a href="edit-category.php?cid=<?php echo htmlentities($row['id']);?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a> 
                                            &nbsp;<a href="manage-teacher.php?rid=<?php echo htmlentities($row['id']);?>&&action=del"> <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
                                            </tr>
                                        <?php
                                        $cnt++;
                                        } ?>
                                        </tbody>
                                                
                                    </table>
                                </div>
                                <!-- End Table -->
                            </div>
                        </div>   
                    </div> 
                </div>
                <!--- end row -->


                            
                <div class="row">
                    <div class="col-md-12">
                        <div class="demo-box m-t-20">
                            <div class="m-b-30">
                                <h4><i class="fa fa-trash-o" ></i> Deleted Categories</h4>
                            </div>

                            <div class="table-responsive">
                            <table class="table m-0 table-colored-bordered table-bordered-danger">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Họ tên</th>
                                        <th>Bộ môn</th>
                                        <th>Trình độ</th>
                                        <th>Số điện thoại</th>
                                        <th>Email</th>
                                        <th>Tuỳ chỉnh</th>
                                    </tr>
                                </thead>

                                <tbody>
<?php 
$query=mysqli_query($con,"Select id,hoten,ngaysinh,noisinh,gioitinh,bomon,trinhdo,sdt,email from giaovien where active=0");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

                                    <tr>
                                        <th scope="row"><?php echo htmlentities($cnt);?></th>
                                        <td><?php echo htmlentities($row['hoten']);?></td>
                                        <td><?php echo htmlentities($row['bomon']);?></td>
                                        <td><?php echo htmlentities($row['trinhdo']);?></td>
                                        <td><?php echo htmlentities($row['sdt']);?></td>
                                        <td><?php echo htmlentities($row['email']);?></td>
                                        <td><a href="manage-teacher.php?resid=<?php echo htmlentities($row['id']);?>"><i class="ion-arrow-return-right" title="Khôi phục"></i></a> 
                                        &nbsp;<a href="manage-teacher.php?rid=<?php echo htmlentities($row['id']);?>&&action=parmdel" title="Xoá vĩnh viễn"> <i class="fa fa-trash-o" style="color: #f05050"></i> </td>
                                    </tr>
                                <?php
                                $cnt++;
                                } ?>
                                </tbody>                 
                                </table>
                            </div>
                        </div>
                    </div>     
                </div> 
                <!--- end row -->                 
            </div> 
            <!-- container -->
        </div> 
        <!-- content -->
    <?php include('includes/footer.php');?>
    </div>
    </div>
    <!-- END wrapper -->
<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="plugins/switchery/switchery.min.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

</body>
</html>
<?php } ?>