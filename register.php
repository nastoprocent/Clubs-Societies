<?php
	ob_start();
	session_start(); // Starts the session
	if( isset($_SESSION['user'])!="" ){
		header("Location: home.php");
	}
	include_once 'dbconnect.php';

	$error = false;

	if ( isset($_POST['btn-signup']) ) {
		
	
		// clean user inputs to prevent sql injections (attacks)
		$name = trim($_POST['name']);																				
		$name = strip_tags($name);
		$name = htmlspecialchars($name);
		
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$email2 = trim($_POST['email2']);
		$email2 = strip_tags($email2);
		$email2 = htmlspecialchars($email2);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		
		$pass2 = trim($_POST['pass2']);
		$pass2 = strip_tags($pass2);
		$pass2 = htmlspecialchars($pass2);
		
		$captcha = trim($_POST['captcha']);
		$captcha = strip_tags($captcha);
		$captcha = htmlspecialchars($captcha);

		// basic name validation
		if (empty($name)) {
			$error = true;
			$nameError = "Please enter your full name."; // Checking if the name box is empty
		} else if (strlen($name) < 3) { //length of name at least 3 letters
			$error = true;
			$nameError = "Name must have atleat 3 characters.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) { //checking if the name contains only letters (small or capital)
			$error = true;
			$nameError = "Name must contain alphabets and space.";
		}
		
		//basic email validation
		if(!preg_match('/^x[\d]{8}@student\.ncirl\.ie$/', $email)){ // forcing exact x(8 numbers)@student.ncirl.ie on the user/student
		    // Return Error - Invalid Email
		    $error = true;
		    $emailError = 'The email you have entered is invalid, please try again.';
		} else {
			// check email exist or not
			$query = "SELECT userEmail FROM users WHERE userEmail='$email'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Provided Email is already in use.";
			}
		}
		
		// confirming the match of emails
			
		if(empty($email2)){
			$error = true;
			$email2Error = "Please confirm your email.";
		}else if($_POST['email']!= $_POST['email2'])
		 {
		    $error = true;
		    $pass2Error = "Oops! Email's do not match! Try again.";
		 }
		
		
		
		// password validation
		if (empty($pass)){
			$error = true;
			$passError = "Please enter password.";
		} else if(strlen($pass) < 6) {
			$error = true;
			$passError = "Password must have atleast 6 characters.";
		}
		// validating if the password match
		if(empty($pass2)){
			$error = true;
			$pass2Error = "Please confirm your password.";
		}else if($_POST['pass']!= $_POST['pass2'])
		 {
		    $error = true;
		    $pass2Error = "Oops! Password's do not match! Try again.";
		 }
		
		// password encrypt using SHA256();
		$password = hash('sha256', $pass);
		
		// captcha for validation of user/robot
		if(empty($captcha)){
			$error = true;
			$captchaErr = "Please write 3 black letteres from captcha.";
		}
		else if($_SESSION['captcha']!==$_POST['captcha'])
			{
				$error = true;
				$captchaErr = "Incorrect Captcha, Please try again.";
			}
		
		// if there's no error, continue to signup
		if( !$error ) {
			
			$query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
			$res = mysql_query($query);
				
			if ($res) {
				$errTyp = "success";
				$errMSG = "Successfully registered, you may login now";
				unset($name);
				unset($email);
				unset($email2);
				unset($pass);
				unset($pass2);
				unset($captcha);
			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";	
			}	
				
		}
		
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0,  minimum-scale=1.0">
<title>Registration</title>
<link rel="stylesheet" href="css/register/Registerbootstrap.css" type="text/css"  />
<link rel="stylesheet" href="css/register/Registerposition.css" type="text/css" />
</head>
<body>

<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<br /><br /><h2 class="">Sign Up to Clubs and Societies</h2>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
            
            
            <div class="form-group">
            	<div class="input-group">
	                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
	            	<input type="text" name="name" class="form-control" placeholder="Enter Your Name Only" maxlength="50" value="" />
                </div>
                <span class="text-danger"><?php echo $nameError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
              		<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            		<input type="email" name="email" class="form-control" placeholder="Enter Your Student Email" maxlength="40" value="" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
              		<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            		<input type="email" name="email2" class="form-control" placeholder="Re-Enter Your Student Email" maxlength="40" value="" />
                </div>
                <span class="text-danger"><?php echo $email2Error; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
	                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
	            	<input type="password" name="pass" class="form-control" placeholder="Chouse Your Password." maxlength="15" />
	            </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
	                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
	            	<input type="password" name="pass2" class="form-control" placeholder="Confirm your password." maxlength="15" />
	            </div>
                <span class="text-danger"><?php echo $pass2Error; ?></span>
            </div>
            
            <div class="form-group">
            	<center><text>Enter only the 3 </text><b>Black</b><text> characters from Captcha: </text></center>
				<div class="input-group" align="center">
					<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
					<img src="captcha.php" alt="captcha image" id="captcha" width="380px" height="80px"><br />
					<input type="text" id="captcha" class="form-control" name="captcha" size="6" maxlength="3" placeholder="Please enter captcha code here.">
				</div>
				<span class="text-danger"><?php echo $captchaErr?></span>
			</div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<a href="index.php">Sign in Here...</a>
            </div>
        
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
<?php ob_end_flush(); ?>