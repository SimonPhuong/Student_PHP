<?php
	$con=mysqli_connect("localhost","root","","detai");
  		if(!$con)
   		{
	   		die("Khong ket noi duoc den CSDL");
			exit();
		}
		else
		{			
			mysqli_set_charset($con,"utf8");
			return $con;
		}
?>