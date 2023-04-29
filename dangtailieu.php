<?php
include("cls/clsupload.php");
$a=new myfile();
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
	transition:all 300ms ease;
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
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Thông báo</h3>
                    <span class="message-count">27</span>
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
            <div class=title><h1>ĐĂNG TÀI LIỆU</h1></div>

            <div class="main-section-content" id="contnet">
                <div class="row" style="display:block">
                                           <div class="row" style="display:block">
                        <div class="box-df profile-ds-info">
                            <div class="portlet">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold" lang="db-thongtinsinhvien">Đăng tài liệu</span>
                                    </div>
                                </div>

                                <div class="porlet-body">
                                    
				<div class="form-horizontal">
                                                <div class="form-body">
                                                    <div class="form-group">
                                        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                        <h3>Môn học:</h3>
                                       <?php
									     $p->loadmon1("select * from giaovienmonhoc where magiaovien='$layid'")
									   ?>
                                       <h3>Chọn khối lớp:</h3>
                                        <select name="khoi" id="khoi" class="form-control" style="margin-top:10px;">
        <option value="10" selected="selected">10</option>
           <option value="11" selected="selected">11</option>
              <option value="12" selected="selected">12</option>
        Chọn file cần upload:
        <label for="myfile"></label>
        <input type="file" name="myfile" id="myfile"  class="form-control"/>
        <input class="btn btn-primary d-grid w-100" type="submit" name="button" id="button" value="Upload"/>
   <?php
switch($_POST['button'])
{
	case 'Upload':
	{
		 $mon=$_REQUEST['txtmon'];
		  $khoi=$_REQUEST['khoi'];
		$name=$_FILES['myfile']['name'];
		$type=$_FILES['myfile']['type'];
		$size=$_FILES['myfile']['size'];
		$tmp_name=$_FILES['myfile']['tmp_name'];
		
         if($a->uploadfile($name,$tmp_name,"tailieu")==1)
			{
				if($p->themxoasua("insert into tailieu1(tenmon,magiaovien,tentailieu,khoi) values('$mon','$layid','$name','$khoi')")==1)
				{
				echo '<script> alert("Đăng tài liệu thành công"); </script>';}
			else
			{
				echo '<script> alert("Đăng tài liệu không thành công"); </script>';
			}
			}	    
		}

		break;
}
?>
</form>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
											 </div>
                            </div>
                        </div>
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

       

                <div class="row" style="box-shadow: 0 2px 10px 0 rgba(114, 109, 109, 0.993); margin-top:10px; border-radius:10px">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title"><h5>Tin tức</h5>
                                                    <?php
						$p->loadtintucgv("select * from tintuc");
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
