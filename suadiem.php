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
	header('location:logingiaovien.php');
}
include("cls/cls.php");
$p=new tmdt();
$layid=$_SESSION['user'];
$layidhs=0;
if(isset($_REQUEST['id']))
{
	$layidhs=$_REQUEST['id'];
}
$layht=$_REQUEST['ht'];
$laynh=$_REQUEST['nh'];
$laymamh=$_REQUEST['mamh'];
$layhk=$_REQUEST['hk'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả học tập</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="ketquahoctap.css">
<link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="login.css">
</head> 
<style>
.form-control {
    display: block;
    width: 50%;
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
	margin:0 auto;
}
#nut
{
	height:40px;
	width:200px;
	border-radius:10px;
	background:#06F;
	color:#FFF;
	font-size:15px;
	margin:0 auto;
}
#nut:hover
{
	background:#000;
}
</style>
<body>
    <main>
        <div class="soLienLacDienTu">
            <!---------------Bảng điểm-------------->

            <div id="bangDiem">
             <form method="POST" action="">
                <!--Bảng điểm HK1-->
                <div class="title"><h2>Sửa điểm </h2></div>
               
               <?php
				echo'<h3>Họ và tên:</h3>
                     <input type="text" class="form-control" id="txtht" name="txtht" value="'.$layht.'" readonly/>
					     <h3>Năm học:</h>
                     <input type="text" class="form-control" id="txtnh" name="txtnh" value="'.$laynh.'" readonly/>
                     <input type="hidden" class="form-control" id="txtmamh" name="txtmamh" value="'.$laymamh.'" readonly/>
					  <h3>Học kì</h3>
                     <input type="text" class="form-control" id="txthk" name="txthk" value="'.$layhk.'" readonly/>';
					 $p->loaddiemhsedit("SELECT * FROM diem WHERE hoten='$layht' AND hocki =$layhk AND namhoc ='$laynh' AND mamonhoc =$laymamh");
					                                                                              
                   switch($_POST['button'])
                        {
	                      case 'Xác nhận':
                          {
		                    $mieng=$_REQUEST['txtdm'];
							 $diem15p=$_REQUEST['txt15'];
							  $diem1tiet=$_REQUEST['txt45'];
							   $diemgk=$_REQUEST['txtgk'];
							    $diemck=$_REQUEST['txtck'];
					if($p->themxoasua("UPDATE diem SET diemmieng=$mieng, diem15phut=$diem15p, diem1tiet=$diem1tiet, diemgk=$diemgk, diemck=$diemck WHERE hoten='$layht' AND hocki =$layhk AND namhoc ='$laynh' AND mamonhoc =$laymamh;")==1)
			                    {
			              	      echo '<script> alert("Sửa điểm thành công!"); </script>';
			                    }
			                 else
			                    {
				                   echo '<script> alert("Sửa điểm không thành công!"); </script>';
								}
                        }
						}
                
				?>
                 <a href="index1.php"><button id="nut" type="button">Trở về trang chủ</button></a>
             </form>
            </div>        
        </div>
    </main>
</body>
</html>
