<?php
include("cls/clsupload.php");
$a=new myfile();
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
$idtea=$_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit teacher</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
       <link rel="stylesheet" href="css/login.css">
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
	transition:all 300ms ease;
}
a:hover
{
	color:#00F;
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
</head>

<body>
    <div class="container">
    <?php include("asideteacher.php"); ?>
        <!------------------- END OF ASIDE --------------------> 
        <main>
            <div class=title><h1>Edit Information</h1></div>

            <div class="main-section-content" id="contnet">
                <div class="row" style="display:block">
                <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <?php
											$p->loadeditteacher($layid,$idtea);
											?>
                                       <?php
                                       ////chỉnh sửa ảnh
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
                                                    if($p->addimageteacher($name,$layid)==1)
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
                                       ///chỉnh sửa thông tin
                                       if(isset($_POST['button']))
                                       {
                                            switch($_POST['button'])
                        {
	                      case 'Xác nhận':
                          {
                           
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
					if($p->editteacher($layid,$fn,$ln,$gender,$phone,$email,$dob,$cic,$nation,$religion,$address,$state,$city)==1)
			                    {
			              	      echo'<script> alert("Edited information successfully!"); </script>'; 
			                    }
			                 else
			                    {
				                   echo '<script> alert("Edited information failed!"); </script>';

								}
                        }
						}
                    }
                 ?>
                                            </form>
                                                
                </div>
            </div>

        </main>
        <!-------------------- END OF MAIN ------------------->
        <?php include("eomteacher.php"); ?>
   </div>
   <script src="js/index.js"></script>
</body>
</html>
<?php } ?>

