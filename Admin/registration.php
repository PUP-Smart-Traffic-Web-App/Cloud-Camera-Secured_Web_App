<?php
  include "dbconnection.php";
  //session_start();
?>

<!DOCTYPE html>
<html>
<head>

  <title>Admin Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

  <style type="text/css">
  	input[type=text],input[type=number],input[type=email],input[type=password] {
  	padding: 16px;
  	margin: 8px;
  	border: 1px solid #f1f1f1;
  	letter-spacing: 1px;
  	border-radius: 3px;
  	width: 240px;
  	}
    section
    {
      margin-top: -20px;
    }
    .radio-inline input[type="radio"],
    {
    position: absolute;
    margin-top: 4px \9;
    margin-left: 10px;
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

<section>
  <div class="reg_img">

    <div class="box2">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"> </h1>
        <h1 style="text-align: center; font-size: 25px;">Admin Registration</h1>

      <form name="Registration" action="" method="post" autocomplete="off">
        
        <div class="login"> 
          <input class="form-control" type="text" name="firstname" placeholder="First Name" required=""> <br>
          <input class="form-control" type="text" name="lastname" placeholder="Last Name" required=""> <br>
          
          <!--<input class="form-control" type="text" name="sex" placeholder="Sex" required=""><br>-->
		  <label for="sex">Sex</label>
		  <br>
	  	  <label for="male" class="radio-inline">
	   	  	<input type="radio"
                  name="sex"
                  required=""
                  value="Male"
                  id="male"/>Male</label >
          <label for="female" class="radio-inline">
          	<input type="radio"
                  name="sex"
                  required=""
                  value="Female"
                  id="female"/>Female</label>
 	      <br>   
          <input class="form-control" type="number" name="contactno" placeholder="Contact Number" required=""><br>
          <input class="form-control" type="email" name="email" placeholder="Email" required=""><br>
		  <input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
          <input class="btn btn-default" type="submit" name="submit" value="Sign Up"> </div>
      <br><br>
      <a style="color:;text-decoration: none;" href=""></a> &nbsp &nbsp &nbsp &nbsp &nbsp  
      Already have an account?<a style="color: ; text-decoration: none;" href="login.php">&nbspLog In</a>
      </p>
      </form>
     
    </div>
  </div>
</section>
<!--
    <?php

      if(isset($_POST['submit']))
      {
        $count=0;
        $sql="SELECT Doc_Email from `Doc_Info`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['Doc_Email']==$_POST['Doc_Email'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          mysqli_query($db,"INSERT INTO `Doc_Info` VALUES('$_POST[Doc_ID]','$_POST[Doc_FName]', '$_POST[Doc_LName]', '$_POST[Doc_Gender]', '$_POST[Doc_ContactNo]', '$_POST[Doc_Email]', '$_POST[Doc_Password]', 'p.jpg');");
        ?>
          <script type="text/javascript">
           alert("Registration successful");
          </script>
        <?php
        }
        else
        {

          ?>
            <script type="text/javascript">
              alert("The username already exist.");
            </script>
          <?php

        }

      }

    ?>
-->

<?php
if(isset($_POST['submit']))
      {
        $count=0;
        $sql="SELECT email FROM `admin`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['email']==$_POST['email'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
        
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$sex = $_POST['sex'];
	$contactno = $_POST['contactno'];
	$email = $_POST['email'];
	$password = $_POST['password'];	
	$otp=rand(111111111,999999999);
	//$_SESSION['session_otp'] = $otp;
	
	$stmt = $db->prepare("insert into admin(firstname, lastname, sex, contactno, email, password, otp) values(?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssisss", $firstname, $lastname, $sex, $contactno, $email, $password, $otp);
	$execval = $stmt->execute();
	echo $execval;
	
	?>	
	<div class="alert alert-complete" style="width: 190px; margin-left: 370px; background-color: #de1313; color: white">
	<strong>&nbspRegistration successful.</strong>
	</div>  
	<?php
		
	?>
	<script type="text/javascript">
	alert("Registration successful");
	</script>
	<?php
	?>
	<script type="text/javascript">
	window.location="login.php"
	</script>
	<?php
	}
	else
	{
	?>	
		<div class="alert alert-danger" style="width: 190px; margin-left: 370px; background-color: #de1313; color: white">
		<strong>&nbspThe email already exist.</strong>
		</div>  
	<?php
	?>
	<script type="text/javascript">
	alert("The email already exist.");
	</script>
	<?php
	
	}
	
	}
	
?>
</body>
</html>