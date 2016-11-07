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

    <title>Clubs and Societies</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="css/buttons.css" rel="stylesheet">
	<link href="css/imghover.css" rel="stylesheet">
	
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
                    <li><div id="box"><form action="search.php" method="post" onclick="ScrollToBottom()">
           			<input type="text" name="search" id="searchBox" maxlength="25" autocomplete="on" placeholder="Search..."/></form></div></li>
                </ul>
            </div>
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

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">

                            <div class="item active">
                                <img class="img-responsive img-full" src="img/Slide1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/Slide2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/Slide3.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/Slide4.jpg" alt="">
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

                    <h1 class="brand-name">Clubs and Societies</h1>
                    <hr class="tagline-divider">

                </div>
            </div>
        </div>

    <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Clubs and Societies</strong>
                    </h2>
                    <hr>
                </div>


	
    <div class="col-sm-4 text-center">
	    <div id="img">
    		<div class="hovereffect">
    			<img class="img-responsive" src="img/basketball.jpg" alt="Society or Club" border="5">
    			<div class="overlay">
         			<h2>Basketball Club</h2>
        			<a class="info" href="basketball.php">Find out More</a>
    			</div>
    		</div>
    	</div>
    	
		<div class="food">
			<div class="thelabel" id="thelabel1">
				<div id="oneplus" class="control">
					<a href="#name" onclick="expand('one');return false">▼</a>
				</div>
				<div id="onenegative" class="control">
					<a href="#name" onclick="collapse('one');return false">▲</a>
				</div>
				<h3 class="name">
				<a href="basketball.php" target="_blank">BASEKETBALL CLUB</a>
				</h3>
			</div>
			<div class="elements" id="one">
				<ul>
				 </br>	<li>1 to 2 tablespoons vinegar, like cider, balsamic, or red wine </li> </br>
					<li>2 to 3 teaspoons dried herbs, like thyme, oregano, rosemary, or crumbled bay leaf</li> </br>
				</ul>
			</div>

		</div>
			</br>
			</br>
			</br>
		<!-- Societies and Clubs 1 -->




		<!-- Societies and Clubs 2 -->
			<div id="img">
    		<div class="hovereffect">
    			<img class="img-responsive" src="img/pool.jpg" alt="Society or Club" border="5">
    			<div class="overlay">
         			<h2>Pool Club</h2>
        			<a class="info" href="pool.php">Find out More</a>
    			</div>
    		</div>
    	</div>
		<div class="food">
				<div class="thelabel" id="thelabel2">
					<div id="one2plus" class="control">
					<a href="#name" onclick="expand('one2');return false">▼</a>
					</div>
					<div id="one2negative" class="control">
					<a href="#name" onclick="collapse('one2');return false">▲</a>
					</div>

					<h3 class="name">
					<a href="pool.php" target="_blank">Pool Club</a>
					</h3>
				</div>
				<div class="elements" id="one2">
					<ul>
					</br><li>1 cup olive oil </li> </br>
					<li>2 medium onions, chopped</li> </br>
					<li>1 Bunch Celery, halved lengthwise and cut into 1/4-inch-thick slices</li> </br>
					</ul>
				</div>
		</div>
		
			</br>
			</br>
			</br>
	</div>
	<!-- Societies and Clubs list 2 -->





	<!-- Societies and Clubs list 3 -->
	<div class="col-sm-4 text-center">
		
		<div id="img">
    		<div class="hovereffect">
    			<img class="img-responsive" src="img/music.jpg" alt="Society or Club" border="5">
    			<div class="overlay">
         			<h2>Music Society</h2>
        			<a class="info" href="music.php">Find out More</a>
    			</div>
    		</div>
    	</div>
    	
		<div class="food">
				<div class="thelabel" id="thelabel3">
					<div id="one3plus" class="control">
					<a href="#name" onclick="expand('one3');return false">▼</a>
					</div>
					<div id="one3negative" class="control">
					<a href="#name" onclick="collapse('one3');return false">▲</a>
					</div>

					<h3 class="name">
					<a href="music.php" target="_blank">Music Society</a>
					</h3>
				</div>
				<div class="elements" id="one3">
					<ul>
					 </br>	
					 	<li>1 cup white sugar</li></br>
						<li>2 tablespoons all-purpose flour</li></br>
					</ul>
				</div>
		</div>
			</br>
			</br>
			</br>
		<!-- Societies and Clubs list 3 -->

	<!-- Societies and Clubs list 4 -->
	
		
				<div id="img">
		    		<div class="hovereffect">
		    			<img class="img-responsive" src="img/gaming.jpg" alt="Society or Club" border="5">
		    			<div class="overlay">
		         			<h2>Gaming Society</h2>
		        			<a class="info" href="gaming.php">Find out More</a>
		    			</div>
		    		</div>
		    	</div>
    	
				<div class="thelabel" id="thelabel4">
					<div id="one4plus" class="control">
					<a href="#name" onclick="expand('one4');return false">▼</a>
					</div>
					<div id="one4negative" class="control">
					<a href="#name" onclick="collapse('one4');return false">▲</a>
					</div>
					
					<h3 class="name">
					<a href="gaming.php" target="_blank">Gaming Society</a>
					</h3>
				</div>
				<div class="elements" id="one4">
					<ul>
					 </br><li><strong>Co-President:</strong> Josephine Andrews</li></br>
						<li><strong>Vice President:</strong> Cillian John Murray</li></br>
						<li><strong>Creator of FB-Fanpage: </strong>Ben Kibabu</li></br>
					</ul>
				</div>
		</div>
			</br>
			</br>
			</br>
    </div>
    <!-- Societies and Clubs list 4 -->

                <div class="clearfix"></div>

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

         <!-- Ajax & JavaScript for recipes -->
    	<script type="text/javascript" src="js/addingajax.js"></script>
		<script type="text/javascript" src="js/acc.js"></script>

</body>

</html>
<?php ob_end_flush(); ?>