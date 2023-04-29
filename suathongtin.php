<?php
session_start();
if(isset($_SESSION['user'])&& isset($_SESSION['pass']))
{
	include("cls/clslogin.php");
	$q=new login();
	$q->confirmlogin($_SESSION['user'],$_SESSION['pass']);
}
else
{
	header('location:login.php');
}
include("cls/cls.php");
$p=new tmdt();
$layid=$_SESSION['user'];
include("cls/clsupload.php");
$a=new myfile();
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
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.js"></script>
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
.profile-ds-info {
    height:auto;
    overflow: hidden;
	padding:20px;
} 
.w-100 {
    width: 60% !important;
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
	transition:all 300ms ease;
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
.form-group
{
	margin-bottom:30px;
}

 </style>
  <script>
  $(document).ready(function(){
	function ktten(){
                var ten=$('#txthoten').val();
                var regten=/^([A-Z][a-z]*(\s*[A-Z]+[a-z]*)*){0,}$/;
                if(regten.test(ten))
                {
                    $('#ktten').html("(✓)");
                    return true;
                }else{
                    $('#ktten').html("Chữ cái đầu tên phải viết hoa!");
                    return false;
                }
            }
   function ktsdt(){
                var dt=$("#txtsdt").val();
                var regdt=/^(0\d{9})$/;
                if(regdt.test(dt))
                {
                    $("#ktsdt").html("(✓)");
                    return true;
                }else{
                    $("#ktsdt").html("Bắt đầu bằng số 0 và phải có 10 số!");
                    return false;
                }
            }
			$('#txthoten').blur(ktten)
			$('#txtsdt').blur(ktsdt)  
  })
 </script>
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
                <a href="index.php" class="active">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Dashboard</h3>
                </a><a href="thongtinchitiet.php">
                    <span class="material-icons-sharp">person_outline</span>
                    <h3>Xem thông tin chi tiết</h3>
                </a><a href="doingugv.php">
                    <span class="material-icons-sharp">school</span>
                    <h3>Đội ngũ giáo viên</h3>
                </a><a href ="#">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Thông báo</h3>
                    <span class="message-count">27</span>
                </a><a href="guigopy.php">
                    <span class="material-icons-sharp">add_circle_outline</span>
                    <h3>Đóng góp ý kiến</h3>
                </a>
                <a href="thaydoipass.php">
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
            <h1 style="text-align:center;">SỬA THÔNG TIN CÁ NHÂN</h1>

            <div class="main-section-content" id="contnet">
                <div class="row" style="display:block">
                <form id="formAuthentication" class="mb-3" action="" method="POST">
                                            <?php
											$p->suathongtin("select * from hocsinh where mahocsinh='$layid' limit 1");
											?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="data.json"></script>
    <script src="api.js"></script>
    <?php
switch($_POST['button'])
{
	case 'Xác nhận':
	{
	 $mahs=$_REQUEST['txtmahs'];
							 $hoten=$_REQUEST['txthoten'];
							 $gt=$_REQUEST['txtgt'];
							 $tt=$_REQUEST['txttt'];
					     	 $nvt=$_REQUEST['txtnvt'];
							 $dc=$_REQUEST['txtdc'];
							 $sdt=$_REQUEST['txtsdt'];
						     $kh=$_REQUEST['txtkh'];
							 $ns=$_REQUEST['txtns'];
							 $socmnd=$_REQUEST['txtcmnd'];
							 $dt=$_REQUEST['txtdt'];
							 $tg=$_REQUEST['txttg'];
							 $tp=$_REQUEST['province'];
							 $huyen=$_REQUEST['district'];
							 $xa=$_REQUEST['town'];
							 $noisinh=$xa.', '.$huyen.', '.$tp;
							 $stk=$_REQUEST['txtstk'];
							 $lop=$_REQUEST['txtlop'];
							 $tnh=$_REQUEST['txttnh'];
		$name=$_FILES['myfile']['name'];
		$type=$_FILES['myfile']['type'];
		$size=$_FILES['myfile']['size'];
		$tmp_name=$_FILES['myfile']['tmp_name'];
		//if($type=="image/jpeg")
		//{
			//$name=time()."_".$name;
         // if($a->uploadfile($name,$tmp_name,"img")==1)S
		   //	{
					if($p->themxoasua("insert into hocsinhedit(mahocsinh,hoten,gioitinh,trangthai,ngayvaotruong,diachi,sdt,khoahoc,ngaysinh,socmnd,dantoc,tongiao,noisinh,lop,hinh) values('$layid','$hoten','$gt','$tt','$nvt','$dc','$sdt','$kh','$ns','$socmnd','$dt','$tg','$noisinh','$lop','$name')")==1)
			                    {
			              	      echo'<script> alert("Gửi thông tin thành công"); </script>'; 
			                    }
			                 else
			                    {
				                   echo '<script> alert("Gửi thông tin không thành công"); </script>';
								}
		 }
		// else
		//  {
		 //  echo 'Upload ảnh không thành công!';
	//  }
	   // }
	//else
		//{
		//	echo'Chỉ cho upload file jpg!';
		//}
		//break;
//}
}
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
                                <span lang="menusinhvien-8-vt">Thời khoá biểu</span>
                            </div>
                        </a>
                    </div>
                    </div>

                    <div class="col-xs-6">
                    <div class="featured-item">
                        <a href="ketquahoctap.php" title="Kết quả học tập" langid="Ketquahoctap">
                            <div class="box-df">
                                <div class="icon">
                                    <span class="material-icons-sharp">leaderboard</span>
                                </div>
                                <span lang="menusinhvien-8-vt">Kết quả học tập</span>
                            </div>
                        </a>
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6">
                    <div class="featured-item">
                        <a href="xemtailieu.php" title="Tin tức" langid="Tintuc">
                            <div class="box-df">
                                <div class="icon">
                                    <span class="material-icons-sharp">description</span>
                                </div>
                                <span lang="menusinhvien-8-vt">Tài liệu trực tuyến</span>
                            </div>
                        </a>
                    </div>
                    </div>

                    <div class="col-xs-6">
                    <div class="featured-item">
                        <a href="congno.php" title="Công nợ" langid="Congno">
                            <div class="box-df">
                                <div class="icon">
                                    <span class="material-icons-sharp">attach_money</span>
                                </div>
                                <span lang="menusinhvien-8-vt">Công nợ</span>
                            </div>
                        </a>
                    </div>
                    </div>
                </div>

                <div class="row" style="box-shadow: 0 2px 10px 0 rgba(114, 109, 109, 0.993); margin-top:10px; border-radius:10px">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title"><h5>Tin tức</h5>
                                  <?php
						$p->loadtintuc("select * from tintuc");
						?></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="index.js"></script>
</body>
</html>
