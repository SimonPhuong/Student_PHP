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
    <title>Change Password</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
     <link rel="stylesheet" href="css/login.css">
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
.w-100 {
    width: 30% !important;
	margin-top:20px;
	margin-bottom:20px;
}
.profile-ds-info {
    height:auto;
    overflow: hidden;
} 
a:hover
{
	color:#00F;
}
</style>
</head>

<body>
    <div class="container">
    <?php include("asidestudent.php"); ?>
        <!------------------- END OF ASIDE --------------------> 
        <main>
            <div class=title><h1>Change Password</h1></div>

            <div class="main-section-content" id="contnet">
                <div class="row" style="display:block">
                                           <div class="row" style="display:block">
                        <div class="box-df profile-ds-info">
                            <div class="portlet">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold" lang="db-thongtinsinhvien">Thay đổi mật khẩu</span>
                                    </div>
                                </div>

                                <div class="porlet-body">
                                    
				<div class="form-horizontal">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                    <form id="formAuthentication" class="mb-3" action="" method="POST">
                                                    <?php
													$p->loadpasscu($layid);
													?>
                                                                               <label for="email" class="form-label">Nhập mật khẩu cũ:</label>
                                  <input
                                    type="text"
                                    class="form-control"
                                    id="txtpasscure"
                                    name="txtpasscure"
                                    placeholder="Mật khẩu cũ"
                                    autofocus
                                    style="margin-bottom:30px;"
                                  />
                                                         <label for="email" class="form-label">Nhập mật khẩu mới:</label>
                                  <input
                                    type="text"
                                    class="form-control"
                                    id="txtpass"
                                    name="txtpass"
                                    placeholder="Mật khẩu mới"
                                    autofocus
                                    style="margin-bottom:30px;"
                                  />
                                  <label for="email" class="form-label">Nhập lại mật khẩu mới:</label>
                                   <input
                                    type="text"
                                    class="form-control"
                                    id="txtrepass"
                                    name="txtrepass"
                                    placeholder="Nhập lại mật khẩu mới"
                                    autofocus
                                  />
                                                        <button class="btn btn-primary d-grid w-100" type="submit" name="button" id="button" value="Xác nhận">Xác nhận</button>
                                                            <?php
                   switch($_POST['button'])
                        {
	                      case 'Xác nhận':
                          {
							  $passcu=$_REQUEST['txtpasscu'];
							  $passcure=$_REQUEST['txtpasscure'];
							  $passcuremd5=md5($passcure);
							  $pass=$_REQUEST['txtpass'];
		                    $pass1=$_REQUEST['txtrepass'];
							$pass2=md5($pass1);
					if($passcuremd5==$passcu)
					{
						if($pass1==$pass)
						{	
				        	if($p->chanepass($pass2,$layid)==1)
			                    {
			              	      echo '<script> alert("Thay đổi mật khẩu thành công!"); </script>'; 
			                    }
			                 else
			                    {
				                   echo '<script> alert("Thay đổi mật khẩu không thành công!"); </script>';
								}
                         }
						else
						{
							echo'Mật khẩu nhập lại không trùng khớp!';
						}
					}
				    else
						{
							echo'Mật khẩu cũ không đúng!';
						}
						  }
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
        <?php
include("eomstudent.php");
?> 
    </div>
    <script src="js/index.js"></script>
</body>
</html>
