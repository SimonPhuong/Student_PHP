<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:login.php');
}
else{
include("cls/cls.php");
$p=new tmdt();
$layid=$_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View student grades</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="css/learning.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/login.css">
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
                                <div class="info" style="margin-bottom: 10px;">LEARNING OUTCOMES</div>
                                <form method="POST" action="">
                            </td>
                        </tr>
                        
                        <tr>
                            <td width="190">Choose a school year:</td>
                            <td align="left">
                                <select name="namhoc" id="namhoc" class="form-control" style="margin-top:10px;">
                               <option value="2022-2023" selected="selected">2022-2023</option>
                               <option value="2023-2024" selected="selected">2023-2024</option>
                               <option value="2024-2025" selected="selected">2024-2025</option>
                                 </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="190">Choose a semester:</td>
                            <td align="left">
                                <select name="hocki" id="hocki" class="form-control" style="margin-top:10px;">
                               <option value="1" selected="selected">1</option>
                               <option value="2" selected="selected">2</option>
                                 </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="190">Choose a class:</td>
                            <td align="left">
                                <?php
                                $p->loadclass($layid);
								?>
                            </td>
                        </tr>
                         <tr>
                            <td width="190"></td>
                            <td align="left">
                                <a href="indexteacher.php"><input class="btn btn-primary d-grid w-100" type="button"  value="Back to home page"/></a>
                                <a href="enterscore.php"><input class="btn btn-primary d-grid w-100" type="button"  value="Enter scores and edit scores"/></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <!---------------Bảng điểm-------------->

            <div id="bangDiem">

                <!--Bảng điểm HK1-->
                   <?php
				$p->loadidsub($layid);
                if(isset($_REQUEST['txtmamh']))
                {
				$mamon=$_REQUEST['txtmamh'];
                }
				?>
                <div class="title"><b>Learning outcomes</b></div>
                <table class="center">
                    <tbody id="load">
                    </tbody>
                </table>
                
                <!--Thành tích HK1-->
                <div class="title"><b>Academic achievement of semester 1</b></div>

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
                            var hk=$('#hocki').val();
						var namhoc=$("#namhoc").val();
							$.ajax({
								url:"ajax/data.php",
								method:"POST",
								data:{namhoc:namhoc,mamonhoc:mamonhoc,tenlop:tenlop,hk:hk},
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
<?php } ?>