<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>User Authentication</title>
		
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
	
<style type="text/css">
 .second_division
 {
	display:none;
 }
</style>
	
</head>

	<body>
	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
			
			<form method="post" class="form-horizontal">
				
				<h4 class="text-center">Please validate your email.</h3>
				
				<!-- first division start -->
				
				<div class="form-group first_division">
				<label class="col-sm-3 control-label"></label>
				<div class="col-sm-6">
				<input type="text" id="txt_email" class="form-control" placeholder="Enter email" />
				</div>
				</div>
				<br>
				<div class="form-group first_division">
				<div class="col-sm-offset-3 col-sm-6 m-t-15">
				<button type="button" id="btn_send" class="btn btn-success btn-block">Send OTP</button>
				</div>
				</div>
				
				<center>
					<span class="text-danger" id="email_error" style="font-size:20px;"></span>
					<span class="text-success" id="success_msg" style="font-size:20px;"></span>
				</center>
				
				<!-- first division end -->
				
				<!-- second division start -->
				
				<div class="form-group second_division">
				<label class="col-sm-3 control-label">Enter OTP</label>
				<div class="col-sm-6">
				<input type="text" id="txt_otp" class="form-control" placeholder="enter otp" />
				</div>
				</div>
				
				<div class="form-group second_division">
				<div class="col-sm-offset-3 col-sm-6 m-t-15">
				<button type="button" id="btn_submit" class="btn btn-warning btn-block">Submit OTP</button>
				</div>
				</div>	
				
				<center>
					<span id="otp_error" class="text-danger" style="font-size:20px;"></span>
				</center>
				
				<!-- second division end -->	
				
			</form>
			
		</div>
		
	</div>
			
	</div>
										
	</body>
	
</html>


<script type="text/javascript">	
		
$(document).ready(function(){
	
	$(document).on("click", "#btn_send", function(e){	
				
		var email = $("#txt_email").val();
		var atpos = email.indexOf("@");
		var dotpos = email.lastIndexOf(".com");
			
		if(email == ""){
			alert("Please Enter Email Address"); 
		}
		else if(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length){
			alert("Please enter valid email address!"); 
		}
		else{
			$.ajax({
				url: "send_otp.php",
				type: "post",
				data: {uemail:email},
				success:function(response){
					if($.trim(response)=="send"){
						$("#email_error").remove();
						$("#success_msg").html("otp send check your mail box... and enter it here");
						$(".second_division").show();
						$(".first_division").hide();
					}	
					if($.trim(response)=="wrong_email"){
						$("#email_error").html("sorry, you enter wrong email");
					}	
				}
				
			});	
		}	
	});

	$(document).on("click", "#btn_submit", function(e){	
		var otp=$("#txt_otp").val();
		$.ajax({
			url:"check_otp.php",
			type:"post",
			data: {uotp:otp},
			success:function(response){
				if($.trim(response)==="valid"){
					window.location="welcome.php"
				}
				if($.trim(response)==="invalid"){
					$("#otp_error").html("sorry, you enter invalid otp number");
				}
			}
		});
	});
	
});

</script>
	