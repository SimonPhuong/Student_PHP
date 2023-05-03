<?php
session_start();
if(isset($_SESSION['user'])&& isset($_SESSION['pass']))
{
	include("../cls/clslogin.php");
	$q=new login();
	$q->confirmlogin($_SESSION['user'],$_SESSION['pass']);
}
else
{
	header('location:../login.php');
}
?>
<?php
           $servername = "localhost";
           $username = "root";
           $password = "";
           
           try {
             $con = new PDO("mysql:host=$servername;dbname=doan2", $username, $password);
             // set the PDO error mode to exception
             $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             //echo "Connected successfully";
           } catch(PDOException $e) {
             //echo "Connection failed: " . $e->getMessage();
           }
           return $con;
        ?>
<?php
$layid=$_SESSION['user'];
$is_tea=$_SESSION['is_tea'];
$is_stu=$_SESSION['is_stu'];
$pass=$_SESSION['pass'];
// Fetch data from database on the basis of username and password
$stmt = $con->prepare("SELECT * FROM users WHERE id_user = :username");
$stmt->bindParam(':username', $layid);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if($row) {
    $hashpassword = $row['password']; // Lấy mật khẩu đã được băm từ cơ sở dữ liệu
    // Xác thực mật khẩu
    if (password_verify($pass, $hashpassword)) 
    {
        if($row['is_student']==1)
        {
            echo'bạn là học sinh';
         header("location:../index.php");
        }
        elseif($row['is_teacher']==1)
        {
            echo'bạn là giáo viên';
         header("location:../index1.php");
        }
    }
}
?>