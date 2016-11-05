<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contact Us</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

</head>
<body>

    <!-- Navigation menu -->
    
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Clubs & Socs</a>
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li> <a href="clubsoc.php">Club&Societies</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="contactus.php">Contact Us</a></li>
                    <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    			     <span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $userRow['userName']; ?>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Navigation menu -->

    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact
                        <strong>Clubs and Societies support </strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-8">
                    <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="642" height="443" src="https://maps.google.com/maps?hl=en&q=National College of Ireland, Mayor Street, IFSC, Dublin 1&ie=UTF8&t=roadmap&z=16&iwloc=B&output=embed"><div><small><a href="http://embedgooglemaps.com">embedgooglemaps.com</a></small></div><div><small><a href="http://buyproxies.io/">buy proxies</a></small></div></iframe>
                </div>
                    <div class="col-md-4">
                        <p>Phone:
                            <strong>123.456.7890</strong>
                        </p>
                        <p>Email:
                            <strong><a href="mailto:name@example.com">ClubsAndSocietiesNCI@gmail.com</a></strong>
                        </p>
                        <p>Address:
                            <strong>Mayor Street, IFSC Dublin 1</strong>
                        </p>
                    </div>
                <div class="clearfix"></div>
            </div>
        </div>


        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact
                        <strong>form</strong>
                    </h2>
                    <hr>
                    <p><h6><center> Please contact us if you would like to know anything about a recipe or anything about or site. We will gladly get back to you.</center></h6></p>
                        <form action = "savetoxml.php" method = "post">
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Email Address</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Phone Number</label>
                                    <input type="tel" name="phone" class="form-control">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-lg-12">
                                    <label>Message</label>
                                    <textarea class="form-control" name="message" rows="6"></textarea>
                                </div>
                                <div class="form-group col-lg-12">
                                    <input type="hidden" name="save" value="contact">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
        </div>

    </div>           
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Bdoor & David & Jason & Sumit  2016</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php ob_end_flush(); ?>