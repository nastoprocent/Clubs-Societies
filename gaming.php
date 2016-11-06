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

    <title>Gaming</title>

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
            <li><a class="page-scroll" href="clubsoc.php">Club&Socities</a></li>
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
    <!-- Slide show menu -->
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

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">

                            <div class="item active">
                                <img class="img-responsive img-full" src="img/gamingslide1.jpg" alt="" height="500px">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/gamingslide2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/gamingslide3.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/gamingslide4.jpg" alt="">
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
                    <hr>
                    <h2 class="brand-before">
                        <small>Welcome to</small>
                    </h2>

                    <h1 class="brand-name">Gaming</h1>
                    <hr class="tagline-divider">

                </div>
            </div>
        </div>
        <!-- Slide show menu -->
        
        <!-- Heading Row -->
            <div class="row">
                <div class="box">
                    <div class="col-md-8">
                        <img class="img-responsive img-rounded" src="http://placehold.it/900x500" alt="">
                    </div>
                    <div class="col-md-4">
                        <h1>Gaming Society</h1>
                        <p>Welcome to the NCI Gaming Soc page! Our aim to provide students of NCI a competive and fun gaming experience in the college. We will play a variety of games from console gaming platforms such as playstation, Xbox and PC and even retro consoles! 

                            Any suggestions or ideas please feel free to post it on our group page. Your feedback is important as it's your society!
                            
                            If you post any form of spam on this page I will unleash my angry ban hammer and it upsets our team greatly. </p>
                    </div>
                </div>
            </div>
        <!-- Heading Row -->
        
        <!-- Content Row -->
            <div class="row">
                <div class="box">
                    <div class="col-md-4">
                        <names>Josephine Andrews</names><br /><br />
                        <img border="0" src="clubsandsocsreps/gaming/gamingrep3.jpg" height="350"></img>
                        <br /><br />
                        <p><strong>Co-President:</strong> Josephine Andrews</p>
                    </div>
                    <div class="col-md-4">
                        <names>Cillian John Murray</names><br /><br />
                        <img border="0" src="clubsandsocsreps/gaming/gamingrep2.jpg" height="350"></img>
                        <br /><br />
                        <p><strong>Vice President:</strong> Cillian John Murray</p>
                    </div>
                    <div class="col-md-4">
                        <names>Ben Kibabu</names><br /><br />
                        <img border="0" src="clubsandsocsreps/gaming/gamingrep1.jpg" height="350"></img>
                        <br /><br />
                        <p><strong>Creator of FB-Fanpage: </strong>Ben Kibabu</p>
                    </div>
                </div>
            </div>
        
        <!-- Content Row -->
        
    	<div class="row">
            <div class="box">
                <form>
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="name" class="form-control" id="nameform" aria-describedby="emailHelp" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" id="passwordform" placeholder="Please enter your student email">
                    </div>
                    <div class="form-group">
                      <label for="phone" class="from-control">Phone Number</label>
                        <input class="form-control" type="tel" value="08" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="Date">Date of Birth</label>
                        <input class="form-control" type="date" value="" id="dateform">
                    </div>
                    <div class="form-group">
                        <label for="Questions/Comments">Questions/Comments</label>
                        <textarea class="form-control" id="questions/comments" rows="4"></textarea>
                        
                        <small id="emailHelp" class="form-text text-muted">We'll never share your information with anyone else.</small>
                        
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="submit" class="btn btn-primary">Clear</button>
                </form>
           </div>
    	</div>
    </div>
    <!-- /.container -->

    

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
	
	
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Bdoor & David & Jason & Sumit  2016</p>
                </div>
            </div>
        </div>
    </footer>
    
</body>

</html>
<?php ob_end_flush(); ?>