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
	header('location:logingiaovien.php');
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
img:hover
{
	width:200px;
	height:200px;
	box-shadow: 0 5px 10px 0 rgba(114, 109, 109, 0.993);
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
    <?php include("aside.php"); ?>
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
                    <tbody id="ten">
                    <tr class="tophead">
	<th width="300px;">ID STUDENT</th>
	<th>STUDEN NAME</th>
	<th>GENDER</th>
	<th>PHONE</th>
	<th>EMAIL</th>
	<th>DATE OF BIRTH</th>
	<th>CITIZEN IDENTITY CARD</th>
	<th>NATION</th>
    <th>RELIGION</th>
    <th>ADDRESS</th>
</tr>
<?php
$p->loadseestudent($layid);
?>
                    </tbody>
                </table>
                    
        </main>
        <!-------------------- END OF MAIN ------------------->
        
        <?php include("endofmain.php"); ?>
    </div>
    <script src="index.js"></script>
</body>
</html>
