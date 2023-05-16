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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post document</title>
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
            <div class=title><h1>UPLOAD DOCUMENTS</h1></div>

            <div class="main-section-content" id="contnet">
                <div class="row" style="display:block">
                                           <div class="row" style="display:block">
                        <div class="box-df profile-ds-info">
                            <div class="portlet">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold" lang="db-thongtinsinhvien">Upload documents</span>
                                    </div>
                                </div>

                                <div class="porlet-body">
                                    
				<div class="form-horizontal">
                                                <div class="form-body">
                                                    <div class="form-group">
                                        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                        <h3>Subject:</h3>
                                       <?php
									     $p->loadsubfile($layid)
									   ?>
                                       <h3>Choose grade:</h3>
                                        <select name="khoi" id="khoi" class="form-control" style="margin-top:10px;">
        <option value="10" selected="selected">10</option>
           <option value="11" selected="selected">11</option>
              <option value="12" selected="selected">12</option>
              Choose files to upload:
        <label for="myfile"></label>
        <input type="file" name="myfile" id="myfile"  class="form-control"/>
        <input class="btn btn-primary d-grid w-100" type="submit" name="button" id="button" value="Upload"/>
   <?php
   if(isset($_POST['button']))
   {
switch($_POST['button'])
{
	case 'Upload':
	{
		 $mon=$_REQUEST['txtmon'];
		  $khoi=$_REQUEST['khoi'];
		$name=$_FILES['myfile']['name'];
		$type=$_FILES['myfile']['type'];
		$size=$_FILES['myfile']['size'];
		$tmp_name=$_FILES['myfile']['tmp_name'];
		
         if($a->uploadfile($name,$tmp_name,"tailieu")==1)
			{
				if($p->addfile($mon,$layid,$name,$khoi)==1)
				{
				echo '<script> alert("Document upload successful!"); </script>';
            }
			else
			{
				echo '<script> alert("Document upload failed!"); </script>';
			}
			}	    
		}

		break;
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
        <?php include("eomteacher.php"); ?>
   </div>
   <script src="js/index.js"></script>
</body>
</html>
<?php } ?>