<?php
session_start();

require_once "dbconnection.php";

if(isset($_POST["uotp"]))	
{
	$otp = $_POST["uotp"];

	$email = $_SESSION["USER_EMAIL"];
	
	$result=mysqli_query($db,"SELECT * FROM admin WHERE email='".$email."' and otp='".$otp."' ");
	
	$count=mysqli_num_rows($result);
	
	if($count > 0)
	{
		mysqli_query($db,"UPDATE admin SET otp='' WHERE email='".$email."' ");
		
		$_SESSION["USER_LOGIN"]=$email;
		
		echo "valid";
	}
	else
	{
		echo "invalid";
	}
}	
?>