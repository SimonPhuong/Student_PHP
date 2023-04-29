<?php
class login
{
     private function connect()
	{				
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
	}

	public function mylogin($user,$pass)
	{
	    $link=$this->connect();
	    $sql="select mahocsinh, pass from taikhoanhs where mahocsinh='$user' and pass='$pass' limit 1";
		$kq=mysqli_query($link,$sql);
		$i=mysqli_num_rows($kq);
		if($i==1)
		{
			while($row=mysqli_fetch_array($kq))
			{
				$username=$row['mahocsinh'];
				$password=$row['pass'];
				session_start();
				$_SESSION['user']=$username;
				$_SESSION['pass']=$password;
			}
			return 1;
		}
		else
		{
			return 0;
		}
	}
	function confirmlogin($user,$pass)
	{
		$link=$this->connect();
		$sql="select mahocsinh, pass from taikhoanhs where mahocsinh='$user' and pass='$pass' limit 1";
		$kq=mysqli_query($link,$sql);
		$i=mysqli_num_rows($kq);
		if($i!=1)
		{
			header('location:login.php');
		}
	}
	public function mylogin1($user,$pass)
	{
	    $link=$this->connect();
	    $sql="select magiaovien, pass from taikhoangv where magiaovien='$user' and pass='$pass' limit 1";
		$kq=mysqli_query($link,$sql);
		$i=mysqli_num_rows($kq);
		if($i==1)
		{
			while($row=mysqli_fetch_array($kq))
			{
				$username=$row['magiaovien'];
				$password=$row['pass'];
				session_start();
				$_SESSION['user']=$username;
				$_SESSION['pass']=$password;
			}
			return 1;
		}
		else
		{
			return 0;
		}
	}
	function confirmlogin1($user,$pass)
	{
		$link=$this->connect();
		$sql="select magiaovien, pass from taikhoangv where magiaovien='$user' and pass='$pass' limit 1";
		$kq=mysqli_query($link,$sql);
		$i=mysqli_num_rows($kq);
		if($i!=1)
		{
			header('location:logingiaovien.php');
		}
	}
	
}
?>