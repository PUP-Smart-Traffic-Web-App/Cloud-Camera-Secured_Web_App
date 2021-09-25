<?php
session_start();

require_once "dbconnection.php";

if(isset($_POST['uemail']))	
{
	$email=$_POST['uemail'];
	
	$result=mysqli_query($db,"SELECT * FROM admin WHERE email='".$email."' ");
	
	$count=mysqli_num_rows($result);
	
	if($count > 0)
	{
		$otp=rand(11111,99999); //generate otp randomly
		
		mysqli_query($db,"UPDATE admin SET otp='".$otp."' WHERE email='".$email."' ");
		
		$otp_code = "Your otp verification code is ".$otp;
		
		$_SESSION["USER_EMAIL"]=$email; //set current user email in $_SESSION[] method
			
		require_once('smtp/PHPMailerAutoload.php');
					
		$mail=new PHPMailer(true);
		$mail->isSMTP();
		$mail->Host="smtp.gmail.com";
		$mail->Port=587;
		$mail->SMTPSecure="tls";
		$mail->SMTPAuth=true;
		$mail->Username=""; //Enter your gmail id
		$mail->Password=""; //Enter your gmail id password
		$mail->SetFrom(""); //Enter your gmail id
		$mail->addAddress($email); //paste user email 
		$mail->IsHTML(true);
		$mail->Subject="OTP Verification";
		$mail->Body = ($otp_code);
		$mail->SMTPOptions=array('ssl'=>array(
					'verify_peer'=>false,
					'verify_peer_name'=>false,
					'allow_self_signed'=>false
				));

		if($mail->send())
		{	
			echo "send";
		}
		else
		{
			echo "Mailer Error" . $mail->ErrorInfo;
		}
	}
	else
	{
		echo "wrong_email";
	}
}


?>