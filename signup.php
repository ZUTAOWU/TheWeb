<!DOCTYPE html>
<html>
	<head> 
		<?php include 'head.inc';?>
		<title>SignUp</title>
	</head>

	<?php
		require('core.php'); 
		if(!empty($_POST)){ 
			//if has post then get sign up information
			$username = array_key_exists('username', $_POST) ? $_POST['username'] : "";
			$email = array_key_exists('email', $_POST) ? $_POST['email'] : "";
			$password = array_key_exists('password', $_POST) ? $_POST['password'] : "";
			$repassword = array_key_exists('repassword', $_POST) ? $_POST['repassword'] : "";
			$sex = array_key_exists('sex', $_POST) ? $_POST['sex'] : "";
			// if pass php validate, then insert user information to database
			if (validate_signUp($username, $email, $password, $repassword, $sex)) {
				if(insert_signup($username, $email, $password, $sex)) {
					// if signup success, then create session and login
					 session_start();
			 		 $_SESSION['username'] = $username;
			 		 $_SESSION['email'] = $email;
			 		 header('Location:  index.php');
				}
			}
		} 
	?>
	
	<body>
		<div class="whole-page">
			<?php include 'menu.inc';?>
			<div class ="whole-content">
				<div class="signup-page">
					<div class="signup-main"> 
						<div class="signup-header">Join Us</div>
						<div class="signup-content"> 
							<form id="signup-form" action="signup.php" method="post">
								<div class="signup-box "> 

									<span class="signup-hint">User Name:</span> <br/>
									<input id='signup-input-username' class="email-input-box signup-inputbox" type="text" name="username" value="" /> 
									<span class="signup-error error-username-message"> *invalid username </span><br/> <br/>

									<span class="signup-hint">Email:</span> <br/>
									<input id='signup-input-email' class="email-input-box signup-inputbox" type="text" name="email" value="" /> 
									<span class="signup-error error-email-message"> *invalid Email </span><br/> <br/>

									<span class="signup-hint">Password:</span> <br/>
									<input id='signup-password' class="password-input-box signup-inputbox" type="password" name="password" value="" />  
									<span class="signup-error error-password-message"> *please input correct password </span> <br/> <br/>

									<span class="signup-hint">Confirm your password:</span> <br/>
									<input id='signup-repassword' class="password-input-box signup-inputbox" type="password" name="repassword" value="" /> 
									<span class="signup-error error-repassword-message"> *please input same password</span> <br/> <br/>

									<span class="signup-hint">Sex:</span> <br/>
									<input class="signup-sex" type="radio" name="sex" value="1">Male
									<input class="signup-sex" type="radio" name="sex" value="2">Female
									<br/> <br/>	
								</div> 
								<div class="create-account-button">
									<!-- <span class="button" onclick='if(validateSignup()){document.getElementById("signup-form").submit();}'> Create an account </span> -->
									<span class="button" onclick='if(validateSignup()){document.getElementById("signup-form").submit();}'> Create an account </span>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php include 'footer.inc';?>
		</div>
	</body>
	
</html>