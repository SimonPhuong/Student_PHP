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
    <title>Debt</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/learning.css">
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
.profile-ds-info {
    height: 300px;
    overflow: hidden;
}
#tt
{
	margin-top:20px;
	padding:20px;
	background:#E5E5E5;
	height:70px;
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
</style>
</head>
<body>
    <div class="container">
    <?php include("asidestudent.php"); ?>
        <!------------------- END OF ASIDE --------------------> 
        <main>
            <div class=title><h1>DEBT INFORMATION</h1></div>

            <div class="main-section-content" id="contnet">
                <div class="row" style="display:block">
                 <div class="box-df profile-ds-info">
                 <form action="" method="POST">
                  <table class="center" style="margin:0 auto; margin-top:30px;">
                    <tbody>
                        <tr class="tophead">
                            <th style="width:100px;">ID DEBT</th>
                            <th style="width:100px;">CONTENT</th>
                            <th style="width:100px;">AMOUNT OF MONEY</th>
                            <th style="width:100px;">DEDUCT</th>
                            <th style="width:100px;">STATUS</th>
                            <th style="width:100px;">ID STUDENT</th>
                        </tr>
                        <?php
						$p->loaddebt($layid);
						?>
                     </tbody>
                </table>
                </form>
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