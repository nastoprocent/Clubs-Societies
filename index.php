<?php
	ob_start();
	session_start(); // Starts the session
	require_once 'dbconnect.php';// Import the file "dbconnect.php" which is the connection of project with the database
	
	if ( isset($_SESSION['user'])!="" ) { // It will never let you open index(login) page if you are logged in
		header("Location: home.php"); // Automatic send to home.php and blocking index page.
		exit;
	}
	
	$error = false;
	
	if( isset($_POST['btn-login']) ) {	
		
		// Prevent sql injections (attacks) / clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// Prevent sql injections (attacks) / clear user invalid inputs
		
		// If there's no error this code allows the user to log in:
		if (!$error) {
			
			$password = hash('sha256', $pass); // Password hashing using SHA256 it is encripting of the password that the user is entering so that third people cant read it, to check it do SELECT * FROM users;
			$res=mysql_query("SELECT userId, userName, userPass FROM users WHERE userEmail='$email'"); // Takes the data from the database where the userEmail is equal to the $email that has been inserted
			$row=mysql_fetch_array($res);	// $row = mysql_fetch_array($res)it is returning the row
			$count = mysql_num_rows($res); // If the mail and password correct, it will return only one row
			
			if( $count == 1 && $row['userPass'] == $password ) { // it is taking the userPass and user Id for the session, if the data inserted during login is correct (rest of description line 50) -
				$_SESSION['user'] = $row['userId'];
				header("Location: home.php"); // - header("Location: home.php"); moves the user to the home.php just if the users data is correct
			} else {
				$errMSG = "Incorrect Credentials, Try again..."; // returning error if anything goes wrong.
			}
				
		}
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0,  minimum-scale=1.0"> 
<title>Login</title>
<link rel="stylesheet" href="css/login/Loginbootstrap.css" type="text/css"  />
<link rel="stylesheet" href="css/login/Loginposition.css" type="text/css" />
</head>
<body>

<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<br /><br /><h2 class="">Clubs and Societies Sign In.</h2>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-danger">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Student Email" value="<?php echo $email; ?>" maxlength="40" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<a href="register.php">Sign Up Here...</a>
            </div>
        
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
<?php ob_end_flush(); ?>