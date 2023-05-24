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
$layid=$_SESSION['login'];
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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
a:hover
{
	color:#00F;
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
</style>
</head>

<body>
    <div class="container">
    <?php include("asideteacher.php"); ?>
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
                                        <span class="caption-subject bold" lang="db-thongtinsinhvien">Change password</span>
                                    </div>
                                </div>

                                <div class="porlet-body">
                                    
				<div class="form-horizontal">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                    <form id="formAuthentication" class="mb-3" action="" method="POST">
                                                    <?php
													$p->loadpassold($layid);
													?>
                                                                               <label for="email" class="form-label">Enter old password:</label>
                                  <input
                                    type="text"
                                    class="form-control"
                                    id="passoe"
                                    name="passoe"
                                    style="margin-bottom:30px;"/>
                                  <div id="loadpassold"></div>
                                                         <label for="email" class="form-label">Enter your new password:</label>
                                  <input
                                    type="text"
                                    class="form-control"
                                    id="passnew"
                                    name="passnew"   
                                    style="margin-bottom:30px;"/>
                                  <label for="email" class="form-label">Enter the new password again:</label>
                                   <input
                                    type="text"
                                    class="form-control"
                                    id="repassnew"
                                    name="repassnew"/>
                                                        <button class="btn btn-primary d-grid w-100" type="submit" name="button" id="button" value="Confirm">Confirm</button>
                                                            <?php
                   switch($_POST['button'])
                        {
	                      case 'Confirm':
                          {
							  $passnew=$_REQUEST['passnew'];
							  $repassnew=$_REQUEST['repassnew'];
                              $passold=$_REQUEST['passold'];
							  $passoe=$_REQUEST['passoe'];
                              $passnew1=password_hash( $passnew, PASSWORD_BCRYPT);
                              if (password_verify($passoe,$passold)) 
                              {
                                 if($passnew==$repassnew)
                                 {
                                     if($p->chanepass($passnew1,$layid)==1)
                                     {
                                        echo '<script> alert("Change password successfully!"); </script>'; 
                                     }
                                     else
                                     {
                                        echo '<script> alert("Password change failed!"); </script>'; 
                                     }
                                 } 
                                 else
                                 {
                                    echo '<script> alert("Re-entered password is incorrect!"); </script>'; 
                                 }      
						      }
                              else
                              {
                                echo '<script> alert("old password is not correct!"); </script>'; 
                              }
						}
                    }
                 ?>
                  <script type="text/javascript">
					 $(document).ready(function() {
                        $("#passoe").blur(function()
						{
							var passoe=$(this).val()
                            var passold=$('#passold').val();
							$.ajax({
								url:"ajax/data.php",
								method:"POST",
								data:{passoe:passoe,passold:passold},
								success:function(data)
								{
									$("#loadpassold").html(data);
								}
								});
						});
                    });
					 </script>
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
        <?php include("eomteacher.php"); ?>
    </div>
    <script src="index.js"></script>
</body>
</html>
<?php } ?>