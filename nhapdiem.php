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
$laytenlop=$_REQUEST['tenlop'];
include("db.php"); 
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
   <script src="js/jquery.min.js"></script>
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
	margin-bottom:20px;
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
.w-100 {
    width: 20% !important;
	margin-top:30px;
	margin-bottom:20px;
	margin:0 auto;
}
</style>
<body>
    <main>
        <div class="soLienLacDienTu">
            <!---------------Bảng điểm-------------->

            <div id="bangDiem">
             <form method="POST" action="">
                <!--Bảng điểm HK1-->
                <div class="title"><h2>Nhập điểm</h2></div>
               <h3>Chọn lớp cần nhập điểm</h3>
               <?php
			  $p->loadlop("select * from giaovienlophoc where magiaovien='$layid'");
			 ?>
                <?php
				//$sql_lop = mysqli_query($con,"select * from giaovienlophoc where magiaovien='123456'");
				//while($rows_lop=mysqli_fetch_array($sql_lop))
//{
	//$ten=$rows_lop['tenlop'];
 //echo '<option value="'.$rows_lop['tenlop'].'">'.$ten.'</option>';
//}
				?>
                </select>         
               <h3>Họ và tên:</h3>
               <select id="ten" name="ten" class="form-control">
               </select>
                    
                     <script type="text/javascript">
					 $(document).ready(function() {
                        $("#lop").change(function()
						{
							var lop=$(this).val();
							$.ajax({
								url:"data.php",
								method:"POST",
								data:{lop:lop},
								success:function(data)
								{
									$("#ten").html(data);
								}
								});
						});
                    });
					 </script>
                      <?php
									   $p->loadmamon("select * from giaovienmonhoc where magiaovien='$layid'");
									   ?>
					     <h3>Năm học:</h>
                     <select name="namhoc" id="namhoc" class="form-control">
                     <option value="2022-2023"selected="selected">2022-2023</option>
                     <option value="2023-2024"selected="selected">2023-2024</option>
                     <option value="2024-2025"selected="selected">2024-2025</option>
                     </select>
					  <h3>Học kì</h3>
                    <select name="hocki" id="hocki" class="form-control">
                     <option value="1"selected="selected">1</option>
                     <option value="2"selected="selected">2</option>
                    
                     </select>
					<h3>Điểm miệng:</h3>
                     <input type="number" class="form-control" id="txtdm" name="txtdm" />
                      <h3>Điểm 1 tiết:</h3>
                     <input type="number" class="form-control" id="txt45" name="txt45"/>
					    <h3>Điểm 15 phút</h3>
                     <input type="number" class="form-control" id="tx15" name="txt15" />
                      <h3>Điểm giữa kì:</h3>
                     <input type="number" class="form-control" id="txtgk" name="txtgk" />
                      <h3>Điểm cuối kì:<h3>
                     <input type="number" class="form-control" id="txtck" name="txtck"/>
                     <button id="nut" type="submit" name="button" id="button" value="Xác nhận">Xác nhận</button>
                     
					   <?php                                                                           
                   switch($_POST['button'])
                        {
	                      case 'Xác nhận':
                          {
							  $hoten=$_REQUEST['hoten'];
							  $nh=$_REQUEST['namhoc'];
							  $hk=$_REQUEST['hocki'];
							  $mamh=$_REQUEST['txtmamh'];
							  $tenmon=$_REQUEST['txttenmon'];
		                    $mieng=$_REQUEST['txtdm'];
							 $diem15p=$_REQUEST['txt15'];
							  $diem1tiet=$_REQUEST['txt45'];
							   $diemgk=$_REQUEST['txtgk'];
							    $diemck=$_REQUEST['txtck'];
					if($p->themxoasua("insert into diem(mahocsinh,mamonhoc,diemmieng,diem15phut,diem1tiet,diemgk,diemck,hocki,namhoc) values('$hoten','$mamh','$mieng','$diem15p','$diem1tiet','$diemgk','$diemck','$hk','$nh')")==1)
			                    {
			              	      echo '<script> alert("Nhập điểm thành công!"); </script>';
			                    }
			                 else
			                    {
				                   echo '<script> alert("Nhập điểm không thành công!"); </script>';
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
