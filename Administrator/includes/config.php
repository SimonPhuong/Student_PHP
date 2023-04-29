<?php
// define('DB_SERVER','localhost');
// define('DB_USER','root');
// define('DB_PASS' ,'');
// define('DB_NAME','detai');
// $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// // Check connection
// if (mysqli_connect_errno())
// {
//  echo "Failed to connect to MySQL: " . mysqli_connect_error();
// }

$servername = "localhost";
$username = "root";
$password = "";

try {
  $con = new PDO("mysql:host=$servername;dbname=detai", $username, $password);
  // set the PDO error mode to exception
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>