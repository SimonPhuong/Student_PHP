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
    <title>See student by teacher</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
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
.profile-userpic img {
    width: 150px;
    height: 150px;
    border-radius: 50%!important;
    float: none;
    margin: 0 auto;
    box-shadow: 0 2px 10px 0 rgba(114, 109, 109, 0.993);
    
}
img {
    width: 100px;
    height: 100px;
    border-radius: 10px;
    float: none;
    margin: 0 auto;
    box-shadow: 0 2px 10px 0 rgba(114, 109, 109, 0.993);
    
}
a:hover
{
	color:#00F;
}
</style>
</head>

<body>
    <div class="container">
    <?php include("asideteacher.php"); ?>
        <!------------------- END OF ASIDE --------------------> 
        <main>
            <div class=title><h1>SEE STUDENT IN CLASS</h1></div>

            <div class="main-section-content" id="contnet">
                <div class="row" style="display:block">
                <div class="box-df profile-ds-info">
                <form action="" method="POST">
                <h2>Choose class: <?php
                                $p->loadclass($layid);
								?></h2>    
                <table class="center" style="margin:0 auto; margin-top:30px;">
                    <tbody id="loadlop">
                    </tbody>
                </table>
                <script type="text/javascript">
					 $(document).ready(function() {
                        $("#lop").change(function()
						{
							var lop=$(this).val()
							$.ajax({
								url:"ajax/data.php",
								method:"POST",
								data:{lop:lop},
								success:function(data)
								{
									$("#loadlop").html(data);
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
        
        <?php include("eomteacher.php"); ?>
    </div>
    <script src="js/index.js"></script>
</body>
</html>
<?php } ?>
