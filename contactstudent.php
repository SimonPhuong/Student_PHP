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
    <title>Contact</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
     <link rel="stylesheet" href="css/login.css">
   <style>
   a:hover
{
	color:#00F;
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
.w-100 {
    width: 30% !important;
	margin-top:20px;
	margin-bottom:20px;
}
#button
{
   transition: background 1s;
}
#button :hover
{
   background: green;
}
</style>
</head>

<body>
    <div class="container">
    <?php include("asidestudent.php"); ?>
        <!------------------- END OF ASIDE --------------------> 
        <main>
            <div class=title><h1>Contact</h1></div>

            <div class="main-section-content" id="contnet">
                <div class="row" style="display:block">
                                           <div class="row" style="display:block">
                        <div class="box-df profile-ds-info">
                            <div class="portlet">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold" lang="db-thongtinsinhvien">CONTACT</span>
                                    </div>
                                </div>

                                <div class="porlet-body">
                                    
				<div class="form-horizontal">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                    <form id="formAuthentication" class="mb-3" action="" method="POST">
                                                         <label for="email" class="form-label">Contact content</label>
                                  <input
                                    type="text"
                                    class="form-control"
                                    id="txtnd"
                                    name="txtnd"
                                    placeholder="Enter contact content..."
                                    autofocus
                                  />
                                                        <button class="btn btn-primary d-grid w-100" type="submit" name="button" id="button" value="Send">Send</button>
                                                                                                <?php
                   if(isset($_POST['button']))
                   {
                   switch($_POST['button'])
                        {
	                      case 'Send':
                          {
		                    $nd=$_REQUEST['txtnd'];
					if($p->sendcontact($layid,$nd)==1)
			                   {
			              	      echo '<script> alert("Gửi góp ý thành công!"); </script>'; 
			                    }
			                 else
			                    {
				                   echo '<script> alert("Gửi góp ý không thành công!"); </script>';
								}
                        }
						}
                    }
                 ?>
                                                        <label for="email" class="form-label">Thank you for contact!</label>
                                                        <br>
                                                        <label for="email" class="form-label">Your feedback will help us to improve the system more optimally</label>
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