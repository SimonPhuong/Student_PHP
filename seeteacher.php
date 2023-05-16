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
    <title>See teacher</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/learning.css">
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
    width: 20% !important;
	margin-top:20px;
	margin-bottom:20px;
}
#ttgv
{
	border-radius:10px;
	border:2px solid #000;
}
</style>
</head>
<body>
    <div class="container">
    <?php include("asidestudent.php"); ?>
        <!------------------- END OF ASIDE --------------------> 
        <main>
            <div class=title><h1>INFORMATION ABOUT THE TEACHING STAFF</h1></div>

            <div class="main-section-content" id="contnet">
                <div class="row" style="display:block">
                <div class="box-df profile-ds-info">
                <form action="" method="POST">
                <h2>Choose subject: 
                    <?php
	$p->loadsubject();
	?>
    </h2>    
    <h2>Information teacher</h2>
                <table class="center" style="margin:0 auto; margin-top:30px;">
                    <tbody id="loadteacher">
                    </tbody>
                </table>
                <script type="text/javascript">
					 $(document).ready(function() {
                        $("#subject").change(function()
						{
							var sub=$(this).val()
							$.ajax({
								url:"ajax/data.php",
								method:"POST",
								data:{sub:sub},
								success:function(data)
								{
									$("#loadteacher").html(data);
								}
								});
						});
                    });
					 </script>
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
<?php } ?>