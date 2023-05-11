<?php
include("cls/clsupload.php");
$a=new myfile();
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
#button1
{
border: none;
background: blue;
color: white;
padding: auto;
border-radius: 4px;
box-shadow: 0 5px 10px 0 rgba(114, 109, 109, 0.993);
transition: .5s;
height:30px;
width: 150px;
margin-top:20px;
}
#button1:hover
{
    box-shadow: none;
    transform: translateY(5px); 
}
#button
{
border: none;
background: blue;
color: white;
padding: auto;
border-radius: 4px;
box-shadow: 0 5px 10px 0 rgba(114, 109, 109, 0.993);
transition: .5s;
height:50px;
width: 250px;
margin-top:20px;
}
#button:hover
{
    box-shadow: none;
    transform: translateY(5px); 
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
                    <h3>View details</h3>
                </a><a href="doingugv.php">
                    <span class="material-icons-sharp">school</span>
                    <h3>See the team of teachers</h3>
                </a><a href="guigopy.php">
                    <span class="material-icons-sharp">add_circle_outline</span>
                    <h3>Contact</h3>
                </a>
                <a href="thaydoipass.php">
                    <span class="material-icons-sharp">add_circle_outline</span>
                    <h3>Change the password</h3>
                </a>
                <a href="logout.php">
                        <span class="material-icons-sharp">logout</span>
                        <button class="form-control" type="submit" id="nut1" name="nut1" value="Đăng xuất">Log
                            out</button>
                </a>
            </div>
        </aside>
        <!------------------- END OF ASIDE --------------------> 
        <main>
            <h1 style="text-align:center;">EDIT PERSONAL INFORMATION</h1>

            <div class="main-section-content" id="contnet">
                <div class="row" style="display:block">
                <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <div class="row" style="display:block">
                        <div class="box-df profile-ds-info">
                            <div class="portlet">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold" lang="db-thongtinsinhvien">Edit Personal Information</span>
                                    </div>
                                </div>

                                <div class="porlet-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                
                                            <div class="text-center">
											Choose an alternate photo:
        <label for="myfile"></label>
        <input type="file" name="myfile" id="myfile" class="form-control" />
		<input  type="submit" name="button1" id="button1" value="Upload"/>
                                            </div>
                                        </div>
                                        <?php
											$p->loadeditstudent($layid);
											?>
                                    </div>    
                                </div>
                            </div>
                        </div>        
    <?php
    ////upload ảnh
    if(isset($_FILES['myfile']))
    {
    if(isset($_POST['button1']))
    {
 switch($_POST['button1'])
 {
     case 'Upload':
     {
         $name=$_FILES['myfile']['name'];
         $type=$_FILES['myfile']['type'];
         $size=$_FILES['myfile']['size'];
         $tmp_name=$_FILES['myfile']['tmp_name'];
         if($type=="image/jpeg" or $type=="image/jpg")
         {
          if($a->uploadfile($name,$tmp_name,"img")==1)
             {
               // $name=$name."."."jpg";
                 if($p->addimagestudent($name,$layid)==1)
                 {
                 echo '<script> alert("Upload photo successfully!"); </script>';
                }
             else
             {
                 echo '<script> alert("Upload photo failed!"); </script>';
             }
             }	
         }
         else
         {
            echo '<script> alert("Only allow upload file jpg!"); </script>';
         }    
         }
 
         break;
         
 }
}
    }
    if(isset($_POST['button']))
    {
switch($_POST['button'])
{
	case 'Xác nhận':
	{
	 $id=$_REQUEST['id'];
							 $fn=$_REQUEST['fn'];
							 $ln=$_REQUEST['ln'];
							 $gender=$_REQUEST['gender'];
					     	 $phone=$_REQUEST['phone'];
							 $email=$_REQUEST['email'];
							 $dob=$_REQUEST['dob'];
						     $cic=$_REQUEST['cic'];
							 $nation=$_REQUEST['nation'];
							 $religion=$_REQUEST['religion'];
							 $address=$_REQUEST['address'];
							 $state=$_REQUEST['state'];
							 $city=$_REQUEST['city'];
		$name=$_FILES['myfile']['name'];
		$type=$_FILES['myfile']['type'];
		$size=$_FILES['myfile']['size'];
		$tmp_name=$_FILES['myfile']['tmp_name'];
		//if($type=="image/jpeg")
		//{
			//$name=time()."_".$name;
         // if($a->uploadfile($name,$tmp_name,"img")==1)
		   //	{
					if($p->editstudent($id,$fn,$ln,$gender,$phone,$email,$dob,$cic,$nation,$religion,$address,$state,$city)==1)
                    {
                        echo'<script> alert("Edited information successfully!"); </script>'; 
                    }
                 else
                    {
                       echo '<script> alert("Edited information failed!"); </script>';
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
                        <span lang="menusinhvien-8-vt">Schedule</span>
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
                        <span lang="menusinhvien-8-vt">Learning outcomes</span>
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
                        <span lang="menusinhvien-8-vt">Study document</span>
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
                        <span lang="menusinhvien-8-vt">Debts</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row"
        style="box-shadow: 0 2px 10px 0 rgba(114, 109, 109, 0.993); margin-top:10px; border-radius:10px">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h5>News</h5>
                    <?php
            $p->loadnews();
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