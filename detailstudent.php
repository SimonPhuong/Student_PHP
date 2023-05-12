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
    <title>Detail student</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <style>
    #nut1 {
        margin-right: 50px;
        height: 40px;
        float: right;
        width: 100px;
        border-radius: 10px;
        color: var(--color-danger);
        font-size: 15px;
    }

    .profile-ds-info {
        height: auto;
        overflow: hidden;
    }

    #tt {
        margin-top: 20px;
        padding: 20px;
        background: #E5E5E5;
        height: auto;
        width: 90%;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    #tt:hover {
        margin-left: 1rem;
        box-shadow: 0 2px 10px 0 rgba(114, 109, 109, 0.993);
        transition: all 300ms ease;
    }

    a:hover {
        color: #00F;
    }
    .profile-userpic img {
    width: 150px;
    height: 150px;
    border-radius: 50%!important;
    float: none;
    margin: 0 auto;
    box-shadow: 0 2px 10px 0 rgba(114, 109, 109, 0.993);
    
}
    img:hover {
        width: 200px;
        height: 200px;
        box-shadow: 0 2px 10px 0 rgba(114, 109, 109, 0.993);
        transition: all 300ms ease;
    }
    </style>
</head>

<body>
    <div class="container">
    <?php include("asidestudent.php"); ?>
        <!------------------- END OF ASIDE -------------------->
        <main>
            <h1 style="text-align:center;">INFORMATION DETAILS</h1>

            <div class="main-section-content" id="contnet">
                <div class="row" style="display:block">
                    <?php
											$p->loaddetailstudent($layid);
											?>
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