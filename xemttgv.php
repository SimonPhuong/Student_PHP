<?php
session_start();
if(isset($_SESSION['user'])&& isset($_SESSION['pass']))
{
	include("cls/clslogin.php");
	$q=new login();
	$q->confirmlogin1($_SESSION['user'],$_SESSION['pass']);
}
else
{
	header('location:logingv.php');
}
include("cls/cls.php");
$p=new tmdt();
$layid=$_SESSION['user'];
$layidtt=$_REQUEST['matt'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
       <link rel="stylesheet" href="login.css">
   <style>
   .form-control {
    display: block;
    width: 100%;
    padding: 0.4375rem 0.875rem;
    font-size: 0.9375rem;
    font-weight: 400;
    line-height: 1.53;
    color: #697a8d;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d9dee3;
    appearance: none;
    border-radius: 0.375rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}	
		  #nut1
{
	margin-right:50px;
	height:40px;
	float:right;
	width:100px;
	border-radius:10px;
	color: var;(--color-danger);
	font-size:15px;
}	
.profile-ds-info {
    height:auto;
    overflow: hidden;
}
.w-100 {
    width: 40% !important;
	margin-top:20px;
	margin-bottom:20px;
}
#tt
{
	margin-top:20px;
	padding:20px;
	background:#E5E5E5;
	height:auto;
	width:90%;
	border-radius:10px;
	margin-bottom:20px;
}
#tt:hover
{
	margin-left: 1rem;
	box-shadow: 0 2px 10px 0 rgba(114, 109, 109, 0.993);
}
a:hover
{
	color:#00F;
}
  </style>
</head>

<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="./img/github.png">
                    <h2>VIE<span class="danger">EDU</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>

            <div class="sidebar">
                 <a href="index1.php" class="active">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Dashboard</h3>
                </a><a href="thongtinchitietgv.php">
                    <span class="material-icons-sharp">person_outline</span>
                    <h3>Xem thông tin chi tiết</h3>
                </a><a href ="#">
                    <span class="material-icons-sharp">auto_graph</span>
                    <h3>Thống kê</h3>
                </a><a href ="#">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Thông báo</h3>
                    <span class="message-count">27</span>
                </a><a href ="#">
                    <span class="material-icons-sharp">report_gmailerrorred</span>
                    <h3>Báo cáo</h3>
                </a><a href ="#">
                    <span class="material-icons-sharp">settings</span>
                    <h3>Cài đặt</h3>
                </a><a href="guigopygv.php">
                    <span class="material-icons-sharp">add_circle_outline</span>
                    <h3>Đóng góp ý kiến</h3>
                </a>
                <a href="thaydoipassgv.php">
                    <span class="material-icons-sharp">add_circle_outline</span>
                    <h3>Thay đổi mật khẩu</h3>
                </a>
                <a href ="#">
                 <form action="" method="POST">
     <span class="material-icons-sharp">logout</span>
    <button class="form-control" type="submit" id="nut1" name="nut1" value="Đăng xuất">Log out</button>
       <?php
         switch($_POST['nut1'])
         {
	        case 'Đăng xuất':
	          {
		         session_destroy();
		         header("location:index.php");
	          }
          }
       ?>
       </a>
                    </form>
            </div>
        </aside>
        <!------------------- END OF ASIDE --------------------> 
         <main>
            <div class=title><h1>TIN TỨC</h1></div>

            <div class="main-section-content" id="contnet">
                <div class="row" style="display:block">
                <form action="" method="POST">
                                            <?php
											$p->loadcttintuc("select * from tintuc where matintuc=".$layidtt."");
											?>
                                            </form>
                </div>
            </div>

        </main>
        <!-------------------- END OF MAIN ------------------->
               
        <div class="right">
           

            <div class="theme-toggler">
                <span class="material-icons-sharp active">light_mode</span>
                <span class="material-icons-sharp">dark_mode</span>
            </div>

            <div class="featured">
                <div class="row">
                    <div class="col-xs-6">
                    <div class="featured-item">
                        <a href="#" title="Lịch theo tuần" langid="Lichtheotuan">
                            <div class="box-df">
                                <div class="icon">
                                    <span class="material-icons-sharp">calendar_month</span>
                                </div>
                                <span lang="menusinhvien-8-vt">Lịch giảng dạy</span>
                            </div>
                        </a>
                    </div>
                    </div>
                     <div class="col-xs-6">
                    <div class="featured-item">
                       <a  href="xemdiemhs.php" title="Lịch theo tuần" langid="Lichtheotuan">
                            <div class="box-df">
                                <div class="icon">
                                    <span class="material-icons-sharp">calendar_month</span>
                                </div>
                                <span lang="menusinhvien-8-vt">Xem điểm học sinh</span>
                            </div>
                        </a>
                    </div>
                    </div>
                     <div class="row">
                    <div class="col-xs-12">
                    <div class="featured-item">
                        <a href="dangtailieu.php" title="Tin tức" langid="Tintuc">
                            <div class="box-df">
                                <div class="icon">
                                    <span class="material-icons-sharp">description</span>
                                </div>
                                <span lang="menusinhvien-8-vt">Đăng tài liệu</span>
                            </div>
                        </a>
                    </div>
                    </div>
                </div>
                </div>

       

                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title"><h5>Tin tức</h5>
                                                    <?php
						$p->loadtintuc("select * from tintuc");
						?>
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="index.js"></script>
</body>
</html>
