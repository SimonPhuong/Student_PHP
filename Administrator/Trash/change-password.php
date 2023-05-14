<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['submit'])){
//Hash Mật khẩu hiện tại bằng BCrypt
    $password=$_POST['password'];
    $options = ['cost' => 12];
    $hashedpass=password_hash($password, PASSWORD_BCRYPT, $options);
    $adminid=$_SESSION['login'];

//Hash mật khẩu mới bằng BCrypt
    $newpassword=$_POST['newpassword'];
    $newhashedpass=password_hash($newpassword, PASSWORD_BCRYPT, $options);

    $sql=mysqli_query($con,"SELECT AdminPassword FROM  tkadmin where AdminUserName='$adminid'");
    $num=mysqli_fetch_array($sql);
    if($num>0) {
    $dbpassword=$num['AdminPassword'];

    if (password_verify($password, $dbpassword)) {

        $con=mysqli_query($con,"update tkadmin set AdminPassword='$newhashedpass' where AdminUserName='$adminid'");
        $msg="Mật khẩu đã được thay đổi!";
        }
    }
    else
    {
    $error="Mật khẩu cũ không đúng!";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Admin | Đổi mật khẩu</title>

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>
        <script type="text/javascript">
function valid()
{
if(document.chngpwd.password.value=="")
{
alert("Mật khẩu hiện tại bị bỏ trống!");
document.chngpwd.password.focus();
return false;
}
else if(document.chngpwd.newpassword.value=="")
{
alert("Mật khẩu mới bị bỏ trống!");
document.chngpwd.newpassword.focus();
return false;
}
else if(document.chngpwd.confirmpassword.value=="")
{
alert("Xác nhận mật khẩu bị bỏ trống!");
document.chngpwd.confirmpassword.focus();
return false;
}
else if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("Xác nhận mật khẩu mới không trùng khớp!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>


    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

<!-- Top Bar Start -->
 <?php include('includes/topheader.php');?>
<!-- Top Bar End -->


<!-- ========== Left Sidebar Start ========== -->
           <?php include('includes/leftsidebar.php');?>
 <!-- Left Sidebar End -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Đổi mật khẩu</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                    
                                        <li class="active">
                                         Đổi mật khẩu
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Thay đổi mật khẩu </b></h4>
                                    <hr />
                        		


<div class="row">
<div class="col-sm-6">  
<!---Success Message--->  
<?php if($msg){ ?>
<div class="alert alert-success" role="alert">
<strong>Hoàn tất!</strong> <?php echo htmlentities($msg);?>
</div>
<?php } ?>

<!---Error Message--->
<?php if($error){ ?>
<div class="alert alert-danger" role="alert">
<strong>Lỗi!</strong> <?php echo htmlentities($error);?></div>
<?php } ?>


</div>
</div>





<div class="row">
<div class="col-md-10">
<form class="form-horizontal" name="chngpwd" method="post" onSubmit="return valid();">

<div class="form-group">
<label class="col-md-4 control-label">Mật khẩu hiện tại</label>
<div class="col-md-8">
<input type="text" class="form-control" value="" name="password" required>
</div>
</div>
	                                     

<div class="form-group">
<label class="col-md-4 control-label">Mật khẩu mới</label>
<div class="col-md-8">
<input type="text" class="form-control" value="" name="newpassword" required>
</div>
</div>


<div class="form-group">
<label class="col-md-4 control-label">Xác nhận mật khẩu</label>
<div class="col-md-8">
<input type="text" class="form-control" value="" name="confirmpassword" required>
</div>
</div>

 <div class="form-group">
<label class="col-md-4 control-label">&nbsp;</label>
<div class="col-md-8">
                                                  
<button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                                                    Lưu
                                                </button>
                                                    </div>
                                                </div>

	                                        </form>
                        				</div>


                        			</div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

<?php include('includes/footer.php');?>

            </div>
        </div>

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