<?php
  include "dbconnection.php";
  if($_POST && "all required variables are present") {
  session_start();
  if($_POST['captcha'] != $_SESSION['digit']) die("Sorry, the CAPTCHA code entered was incorrect!");
  /**<div class="alert alert-danger" style="width: 370px; margin-left: 370px; background-color: #de1313; color: white">
  <strong>&nbsp"Sorry, the CAPTCHA code entered was incorrect!"</strong>
  </div>
  **/
  session_destroy();
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style type="text/css">
		input[type=email],input[type=password] {
			padding: 16px;
			margin: 8px;
			border: 1px solid #f1f1f1;
			letter-spacing: 1px;
			border-radius: 3px;
			width: 240px;
		}
		input[type=submit] {
			margin-left: 8px;
			width: 274px;
			border-radius: 3px;
			border: 1px solid #4285f4;
			background-color: #4285f4;
			padding: 16px;
			color: white;
			font-weight: 600;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<form method="POST" autocomplete="off" onsubmit="return checkForm(this);">
		<input type="email" name="email" placeholder="Email" /><br />
		<input type="password" name="password" placeholder="Password" /><br />
		<br>
		<p><img id="captcha" src="captcha/captcha.php" width="160" height="45" border="1" alt="CAPTCHA">
		<small><a href="#" onclick="
		document.getElementById('captcha').src = 'captcha/captcha.php?' + Math.random();
		document.getElementById('captcha_code_input').value = '';
		return false;
		">refresh</a></small></p>
		<p><input id="captcha_code_input" type="text" name="captcha" size="6" maxlength="5" onkeyup="this.value = this.value.replace(/[^\d]+/g, '');"> <small>copy the digits from the image into this box</small></p>
		
		<br>
		<input type="submit" name="submit" value="LOGIN" />
		<br><br>
	<a style="color:;text-decoration: none;" href="">Forgot password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp  
	New to this website?<a style="color: ; text-decoration: none;" href="registration.php">&nbspSign Up</a>
	</p>
	</form>
<script type="text/javascript">

  function checkForm(form)
  {
    
    if(!form.captcha.value.match(/^\d{5}$/)) {
      alert('Please enter the CAPTCHA digits in the box provided');
      form.captcha.focus();
      return false;
    }    
    return true;
  }

</script>
	
<?php
if($_POST) {
	$email = $_POST["email"];
	$password = $_POST["password"];
	//Making sure that SQL Injection doesn't work
	$email = mysqli_real_escape_string($db, $email);//test or 1=1
	$password = mysqli_real_escape_string($db, $password);
	$sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
	$result = mysqli_query($db, $sql);
	if(mysqli_num_rows($result) == 1) {
		?>
		<script type="text/javascript">
		window.location="loginvalidation.php"
		</script>
		<?php
	} else {
	?>	
		<div class="alert alert-danger" style="width: 370px; margin-left: 370px; background-color: #de1313; color: white">
		<strong>&nbspThe username and password does not match.</strong>
		</div>  
	<?php
	
	?>
	<script type="text/javascript">
	alert("The username and password does not match.");
	</script>
	<?php
	}
}
?>
</body>
</html>