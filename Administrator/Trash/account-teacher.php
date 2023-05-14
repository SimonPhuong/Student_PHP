<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{ 
    header('location:index.php');
}
else{
    if(isset($_POST['submit']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $query=mysqli_query($con,"insert into taikhoangv(magiaovien,pass) values('$username',MD5('$password'))");
        if($query)
        {
        $msg="Tạo tài khoản thành công ";
        }
        else{
        $error="Error!";    
        } 
    }
    
    if($_GET['action']=='del' && $_GET['rid']){
    $id=intval($_GET['rid']);
    $query=mysqli_query($con,"delete from taikhoangv where id='$id'");
    $msg="Xoá tài khoản thành công! ";
    }

    if($_GET['resid']){
        $id=intval($_GET['resid']);
        $query=mysqli_query($con,"update taikhoangv set pass=MD5('12345') where id='$id'");
        $msg="Khôi phục thành công! Mật khẩu mặc định là 12345";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giáo viên | Tài khoản giáo viên</title>
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
                            <h4 class="page-title">Tài khoản</h4>
                            <ol class="breadcrumb p-0 m-0">
                                <li>
                                    <a href="#">Admin</a>
                                </li>
                                <li>
                                    <a href="#">Giáo viên </a>
                                </li>
                                <li class="active">
                                    Tài khoản
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
                            <h4 class="m-t-0 header-title"><b>Tạo tài khoản </b></h4>
                            <hr/>                     		

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
    <strong>Lỗi!</strong> <?php echo htmlentities($error);?>
    </div>
<?php } ?>
                                
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <form class="form-horizontal" name="account" method="post">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">MSGV</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" value="" name="username" placeholder="8 ký tự số" required>
                                            </div>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Mật khẩu</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" value="" name="password" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">&nbsp;</label>
                                            <div class="col-md-10">
                                            
                                        <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                                            Tạo
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

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <div class="m-b-30">
                                <h4 class="m-t-0 header-title"><b>Tài khoản </b></h4>
                                <hr />
                            <div class="table-responsive">
                            <table class="table m-0 table-colored-bordered table-bordered-primary">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>MSGV</th>
                                    <th>Password</th>
                                    <th><center>Khôi phục mật khẩu</th>
                                    <th><center>Xoá</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
$query=mysqli_query($con,"Select id,magiaovien,pass from taikhoangv");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
                                <tr>
                                    <th scope="row"><?php echo htmlentities($cnt);?></th>
                                    <td><?php echo htmlentities($row['magiaovien']);?></td>
                                    <td><?php echo htmlentities($row['pass']);?></td>
                                    <td><center><a href="account-teacher.php?resid=<?php echo htmlentities($row['id']);?>"> <i class="ion-arrow-return-right" title="Khôi phục mật khẩu"></i></a> </td>
                                    <td><center><a href="account-teacher.php?rid=<?php echo htmlentities($row['id']);?>&&action=del"> <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
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
                </div>
                <!-- end row -->
            </div>
            <!-- container -->
        <?php include('includes/footer.php');?>
        </div> 
        <!-- content -->
    </div>
    </div>
    <!-- END warpper -->

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