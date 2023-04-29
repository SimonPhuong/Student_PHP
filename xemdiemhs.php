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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="login.css">
</head> 
<style>
.form-control {
    display: block;
    width: 40%;
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
.w-100 {
    width: 20% !important;
	margin-top:20px;
	margin-bottom:20px;
}
</style>
<body>
    <main>
        <div class="soLienLacDienTu">
                <table cellspacing="0" cellpadding="0" style="width: 100%">
                    <tbody>
            <!--Kết quả học tập HK1-->
                        <tr>
                            <td align="left">
                                <div class="info" style="margin-bottom: 10px;">KẾT QUẢ HỌC TẬP</div>
                                <form method="POST" action="">
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
                         <tr>
                            <td width="190"></td>
                            <td align="left">
                                <a href="index1.php"><input class="btn btn-primary d-grid w-100" type="button"  value="Quay về trang chủ"/></a>
                                <a href="nhapdiempro.php"><input class="btn btn-primary d-grid w-100" type="button"  value="Nhập điểm và chỉnh sửa điểm"/></a>
                            </td>
                        </tr>
                         <tr>
                            <td width="190">Chọn lớp</td>
                            <td align="left">
                                <?php
                                $p->loadlop("select * from giaovienlophoc where magiaovien='$layid'");
								?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <!---------------Bảng điểm-------------->

            <div id="bangDiem">

                <!--Bảng điểm HK1-->
                   <?php
				$p->loadmamon("select * from giaovienmonhoc where magiaovien=".$layid."");
				
				//switch($_POST['button'])
               //  {
	         //     case 'Xem':
	             //  {
				$mamon=$_REQUEST['txtmamh'];
				//$nh=$_REQUEST['namhoc'];
		          //           $mamon=$_REQUEST['txtmamh'];
				 //        	$p->loaddiemhspro("select * from diem where mamonhoc=$mamon and hocki=1 and namhoc='$nh'");
				 //  }
				 //  }
				?>
                <div class="title"><b>Kết quả học tập học kỳ 1</b></div>
                <table class="center">
                    <tbody id="load">
              <?php
			//	$p->loadmamon("select mamonhoc from giaovienmonhoc where magiaovien=".$layid."");
				//switch($_POST['button'])
                 //{
	              //case 'Xem':
	               //{
				//$mamon=$_REQUEST['txtmamh'];
				//$nh=$_REQUEST['namhoc'];
		         //            $mamon=$_REQUEST['txtmamh'];
				  //       	$p->loaddiemhs("select * from diem where mamonhoc=$mamon and hocki=1 and namhoc='$nh'");
				   //}
				   //}
				?>
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
                            <th>Hành động</th>
                            <th width="150px">Trung bình môn</th>
                        </tr>
      <?php
				switch($_POST['button'])
                 {
	              case 'Xem':
	               {
				
				         	$p->loaddiemhs("select * from diem where mamonhoc=$mamon and hocki=2 and namhoc='$nh'");
				   }
				 }
				?>
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
                    <script type="text/javascript">
					 $(document).ready(function() {
                        $("#lop").change(function()
						{
							var tenlop=$(this).val()
							var mamonhoc=$('#txtmamh').val();
						var namhoc=$("#namhoc").val();
							$.ajax({
								url:"data.php",
								method:"POST",
								data:{namhoc:namhoc,mamonhoc:mamonhoc,tenlop:tenlop},
								success:function(data)
								{
									$("#load").html(data);
								}
								});
						});
                    });
					 </script>
             </form>
            </div>        
        </div>
    </main>
</body>
</html>
