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
<?php
class Logout{
    public function logout()
    {
       session_destroy();
       header("location:index.php");
    }
}
$logout = new Logout();
$logout->logout();
?>
<?php } ?>