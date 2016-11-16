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
<?php include_once('functions.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clubs and Societies</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/events/Eventsbootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/events/Eventsbusiness-casual.css" rel="stylesheet">
	<link href="css/events/Eventsstyle.css" rel="stylesheet">
	
	
    <script src="js/jquery.min.js"></script>
     
    <!-- Top socs css --> 
    <style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    }
    </style>
</head>

<body>
       <!-- Navigation menu -->
    
		<nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Clubs & Socs</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a class="page-scroll" href="index.php">Home</a></li>
            <li><a class="page-scroll" href="clubsoc.php">Clubs&Socs</a></li>
            <li><a class="page-scroll" href="events.php">Events</a></li>
            <li><a class="page-scroll" href="contactus.php">Contact Us</a> </li>
          
            <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    			          <span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $userRow['userName']; ?>&nbsp;<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 
    
    
    
    <!-- Navigation menu -->
    
    <div class="container">
     	<div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                    	<!-- Indicators -->

                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                        </ol>
                        
                        <hr>
                    <h2 class="brand-before">
                        <small>Welcome to</small>
                    </h2>

                    <h1 class="brand-name">Clubs and Socs Events</h1>
                    <hr class="tagline-divider">

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">

                            <div class="item active">
                                <img class="img-responsive img-full" src="img/clubsoc/slideShow1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/clubsoc/slideShow2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/clubsoc/slideShow3.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/clubsoc/slideShow4.jpg" alt="">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Events</strong>
                    </h2>
                    <hr>
                </div>
                <div id="calendar_div">
                	<?php echo getCalender(); ?>
                </div>
                
                <div class="col-lg-12">
                <table style="width:50%" align="center">
                 <tr>
                 <td><b>Top Societies</td></b>
                 </tr>
                  <tr>
                    <td>Pool Society</td>
                  </tr>
                  <tr>
                    <td>Gaming Society</td>
                  </tr>
                  <tr>
                    <td>Music Society</td>
                  </tr>
                </table
                </div>
                
                <div class="clearfix"></div>
         	   	</div>
        	</div>
 		</div>
	</div>

    <!-- /.footer -->

<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Bdoor & David & Jason & Sumit  2016</p>
                     <div class="add">
						<a href="https://www.facebook.com/clubsandsocs/?fref=ts"><img src="img//facebook.jpg" alt="" /></a>
						<a href="https://accounts.google.com"><img src="img//google.jpg" alt="" /></a>
						<a href="https://twitter.com/NCIRL"><img src="img//twitter.jpg" alt="" /></a>
						<a href="https://www.youtube.com/user/NCIRL"><img src="img//youtube.jpg" alt="" /></a>
					</div>
                </div>
            </div>
        </div>
</footer>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

         <!-- Ajax & JavaScript for recipes -->
    	<script type="text/javascript" src="js/addingajax.js"></script>
		<script type="text/javascript" src="js/acc.js"></script>

</body>

</html>
<?php ob_end_flush(); ?>