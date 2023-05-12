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
	header('location:loginteacher.php');
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
    <title>Enter score</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="ketquahoctap.css">
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
                                <div class="info" style="margin-bottom: 10px;">ENTER STUDENT POINTS</div>
                                <form method="POST" action="">
                            </td>
                        </tr>
                        
                        <tr>
                            <td width="190">Choose a school year:</td>
                            <td align="left">
                                <select id="namhoc" name="namhoc" class="form-control" style="margin-top:10px;">
                               <option value="2022-2023" selected="selected">2022-2023</option>
                               <option value="2023-2024" selected="selected">2023-2024</option>
                               <option value="2024-2025" selected="selected">2024-2025</option>
                                 </select>
                            </td>
                        </tr>
						<tr>
                            <td width="190">Choose a semester:</td>
                            <td align="left">
                                <select id="hocki" name="hocki" class="form-control" style="margin-top:10px;">
                               <option value="1" selected="selected">1</option>
                               <option value="2" selected="selected">2</option>
                                 </select>
                            </td>
                        </tr>
						<tr>
                            <td width="190">Choose a class</td>
                            <td align="left">
                                <?php
                                $p->loadclass($layid);
								?>
                            </td>
                        </tr>
						<tr>
                            <td width="190"></td>
                            <td align="left">
                                <a href="index1.php"><input class="btn btn-primary d-grid w-100" type="button"  value="Back to home page"/></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <!---------------Bảng điểm-------------->

            <div id="bangDiem">
<?php
				$p->loadidsub($layid);
				if(isset($_REQUEST['txtmamh']))
                {
				$mamon=$_REQUEST['txtmamh'];
                }
				?>
                <!--Bảng điểm HK1-->
                <div class="title"><h2>Enter student grades</h2></div>
                <table class="center">
                    <tbody id="ten">
              
                    </tbody>
                </table>
                <input class="btn btn-primary d-grid w-100" type="submit" name="button" id="button" value="Confirm" style="margin:0 auto; margin-top:20px;"/>
                <script type="text/javascript">
					 $(document).ready(function() {
                        $("#lop").change(function()
						{
							var lop1=$(this).val()
							var nh=$('#namhoc').val()
							var mamh=$('#txtmamh').val();
						    var hocki=$('#hocki').val();
							$.ajax({
								url:"ajax/data.php",
								method:"POST",
								data:{nh:nh,mamh:mamh,lop1:lop1,hocki:hocki},
								success:function(data)
								{
									$("#ten").html(data);
								}
								});
						});
						function insert_data(id,text,column_name,mamon,namhoc,hocki)
						 {
							 $.ajax({
								url:"ajax/data.php",
								method:"POST",
								data:{id:id,text:text,column_name:column_name,mamon:mamon,namhoc:namhoc,hocki:hocki},
								success:function(data)
								{
								}
								});
						 }
						 $(document).on('blur','.oe1',function(){
							 var nh=$('#namhoc').val();
							var mamh=$('#txtmamh').val();
							 var id=$(this).data('id1');
							 var text=$(this).text();
							 var hocki=$('#hocki').val();
							 insert_data(id,text,"oral_exam_1",mamh,nh,hocki);
							 });
							 
							 /////
					    $(document).on('blur','.oe2',function(){
							var nh=$('#namhoc').val();
							var mamh=$('#txtmamh').val();
							 var id=$(this).data('id2');
							 var text=$(this).text();
							 var hocki=$('#hocki').val();
							 insert_data(id,text,"oral_exam_2",mamh,nh,hocki);
							 });
							 /////
	                    $(document).on('blur','.oe3',function(){
							var nh=$('#namhoc').val();
							var mamh=$('#txtmamh').val();
							 var id=$(this).data('id3');
							 var text=$(this).text();
							 var hocki=$('#hocki').val();
							 insert_data(id,text,"oral_exam_3",mamh,nh,hocki);
							 });
							 /////
						$(document).on('blur','.e15m1',function(){
							var nh=$('#namhoc').val();
							var mamh=$('#txtmamh').val();
							 var id=$(this).data('id4');
							 var text=$(this).text();
							 var hocki=$('#hocki').val();
							 insert_data(id,text,"exam_15m_1",mamh,nh,hocki);
							 });
							 //////
						$(document).on('blur','.e15m2',function(){
							var nh=$('#namhoc').val();
							var mamh=$('#txtmamh').val();
							 var id=$(this).data('id5');
							 var text=$(this).text();
							 var hocki=$('#hocki').val();
							 insert_data(id,text,"exam_15m_2",mamh,nh,hocki);
							 });
							 ///////
							 $(document).on('blur','.e15m3',function(){
							var nh=$('#namhoc').val();
							var mamh=$('#txtmamh').val();
							 var id=$(this).data('id6');
							 var text=$(this).text();
							 var hocki=$('#hocki').val();
							 insert_data(id,text,"exam_15m_3",mamh,nh,hocki);
							 });
							 ///////
							 $(document).on('blur','.e45m1',function(){
							var nh=$('#namhoc').val();
							var mamh=$('#txtmamh').val();
							 var id=$(this).data('id7');
							 var text=$(this).text();
							 var hocki=$('#hocki').val();
							 insert_data(id,text,"exam_45m_1",mamh,nh,hocki);
							 });
							 ///////
							 $(document).on('blur','.e45m2',function(){
							var nh=$('#namhoc').val();
							var mamh=$('#txtmamh').val();
							 var id=$(this).data('id8');
							 var text=$(this).text();
							 var hocki=$('#hocki').val();
							 insert_data(id,text,"exam_45m_2",mamh,nh,hocki);
							 });
							 ///////
							 $(document).on('blur','.e45m3',function(){
							var nh=$('#namhoc').val();
							var mamh=$('#txtmamh').val();
							 var id=$(this).data('id9');
							 var text=$(this).text();
							 var hocki=$('#hocki').val();
							 insert_data(id,text,"exam_45m_3",mamh,nh,hocki);
							 });
							 ///////
							 $(document).on('blur','.fe',function(){
							var nh=$('#namhoc').val();
							var mamh=$('#txtmamh').val();
							 var id=$(this).data('id10');
							 var text=$(this).text();
							 var hocki=$('#hocki').val();
							 insert_data(id,text,"final_exam",mamh,nh,hocki);
							 });
							 ///////
                    });
					 </script>
             </form>
            </div>        
        </div>
    </main>
</body>
</html>
