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
      <link rel="stylesheet" href="login.css">
<style>
.w-100 {
    width: 20% !important;
	margin-top:20px;
	margin-bottom:20px;
}
</style>
</head> 
<body>
    <main>
        <div class="soLienLacDienTu">
            <form method="post" action="" id="form-solienlac">
                <table cellspacing="0" cellpadding="0" style="width: 100%">
                    <tbody>
            <!--Kết quả học tập HK1-->
                        <tr>
                            <td align="left">
                                <div class="info" style="margin-bottom: 10px;">KẾT QUẢ HỌC TẬP</div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td width="190">Chọn năm học:</td>
                            <td align="left">
                                   <select name="namhoc" id="namhoc" class="form-control" style="margin-top:10px;">
                               <option value="2022-2023" selected="selected">2022-2023</option>
                               <option value="2023-2024" selected="selected">2023-2024</option>
                               <option value="2024-2025" selected="selected">2024-2025</option>
                                 </select>
                            </td>
                        </tr>
                            <td width="190"></td>
                            <td align="left">
                               <input class="btn btn-primary d-grid w-100" type="submit" name="button" id="button" value="Xem"/>
                               <a href="index.php"><input class="btn btn-primary d-grid w-100" type="button" name="button" id="button" value="Trở lại trang chủ"/></a>
                            </td>
                        </tr>
                    </tbody>
                </table>


            <!---------------Bảng điểm-------------->

            <div id="bangDiem">

                <!--Bảng điểm HK1-->
                <div class="title"><b>Kết quả học tập học kỳ 1</b></div>
                
                <table class="center">
                    <tbody>
                        <tr class="tophead">
                            <th width="180px">Môn học</th>
                            <th>Điểm miệng</th>
                            <th>Điểm 15 phút</th>
                            <th>Điểm 1 tiết</th>
                            <th>Giữa kỳ</th>
                            <th>Cuối kỳ</th>
                            <th width="150px">Trung bình môn</th>
                        </tr>

                        <tr>
                            <td class="subjects">Toán học</td>
                           <?php
                           $hk=1;
                           $mamh=1;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Ngữ văn</td>
                            <?php
                           $hk=1;
                           $mamh=2;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Hoá học</td>
                            <?php
                           $hk=1;
                           $mamh=3;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Vật lý</td>
                            <?php
                           $hk=1;
                           $mamh=4;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Sinh học</td>
                            <?php
                           $hk=1;
                           $mamh=5;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Tin học</td>
                            <?php
                           $hk=1;
                           $mamh=6;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Lịch sử</td>
                            <?php
                           $hk=1;
                           $mamh=7;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Địa lý</td>
                            <?php
                           $hk=1;
                           $mamh=8;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Ngoại ngữ</td>
                            <?php
                           $hk=1;
                           $mamh=9;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">GDCD</td>
                            <?php
                           $hk=1;
                           $mamh=10;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>
                        
                        <tr>
                            <td class="subjects">Công nghệ</td>
                            <?php
                           $hk=1;
                           $mamh=11;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Thể dục</td>
                            <?php
                           $hk=1;
                           $mamh=12;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">GDQP</td>
                            <?php
                           $hk=1;
                           $mamh=13;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                    </tbody>
                </table>
                
                <!--Thành tích HK1-->
                <div class="title"><b>Thành tích HK1</b></div>

                <table class="center">
                    <tbody>
                        <tr colspan="2" style="border-top:1px solid #CCC">
                            <td width="300px">Điểm trung bình</td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Xếp hạng</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Danh hiệu</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Hạnh kiểm</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Học lực</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                

                <!--Bảng điểm HK2-->
                <div class="title"><b>Kết quả học tập học kỳ 2</b></div>
                
                <table class="center">
                    <tbody>
                        <tr class="tophead">
                            <th width="180px">Môn học</th>
                            <th>Điểm miệng</th>
                            <th>Điểm 15 phút</th>
                            <th>Điểm 1 tiết</th>
                            <th>Giữa kỳ</th>
                            <th>Cuối kỳ</th>
                            <th width="150px">Trung bình môn</th>
                        </tr>

                        <tr>
                            <td class="subjects">Toán học</td>
                            <?php
                           $hk=2;
                           $mamh=1;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Ngữ văn</td>
                            <?php
                           $hk=2;
                           $mamh=2;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Hoá học</td>
                            <?php
                           $hk=2;
                           $mamh=3;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Vật lý</td>
                            <?php
                           $hk=2;
                           $mamh=4;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Sinh học</td>
                            <?php
                           $hk=2;
                           $mamh=5;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Tin học</td>
                            <?php
                           $hk=2;
                           $mamh=6;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Lịch sử</td>
                            <?php
                           $hk=2;
                           $mamh=7;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Địa lý</td>
                            <?php
                           $hk=2;
                           $mamh=8;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Ngoại ngữ</td>
                            <?php
                           $hk=2;
                           $mamh=9;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">GDCD</td>
                            <?php
                           $hk=2;
                           $mamh=10;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>
                        
                        <tr>
                            <td class="subjects">Công nghệ</td>
                            <?php
                           $hk=2;
                           $mamh=11;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Thể dục</td>
                            <?php
                           $hk=2;
                           $mamh=12;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">GDQP</td>
                            <?php
                           $hk=2;
                           $mamh=13;
						   switch($_POST['button'])
                 {
	              case 'Xem':
	               {
					   $nh=$_REQUEST['namhoc'];
						   $p->loaddiem($layid,$mamh,$hk,$nh);
				   }
				 }
						   ?>
                        </tr>
                    </tbody>
                </table>  
                <!--Thành tích HK2-->
                <div class="title"><b>Thành tích HK2</b></div>

                <table class="center">
                    <tbody>
                        <tr colspan="2" style="border-top:1px solid #CCC">
                            <td width="300px">Điểm trung bình</td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Xếp hạng</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Danh hiệu</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Hạnh kiểm</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Học lực</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>        
        </div>
    </main>
</body>
</html>
