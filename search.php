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
<?php

    mysql_connect("localhost", "root", "") or die ("Could not connect");
    mysql_select_db("clubsandsocs") or die("Could not find database");
    $output = '';
    
    if(isset($_POST['search'])){
        $searchq = $_POST['search'];
        
        $query = mysql_query("SELECT * FROM Search WHERE title LIKE '%$searchq%' or description LIKE '%$searchq%' ") or die(mysql_error());
        $count = mysql_num_rows($query);
        if($count == 0){
            $output = '<br />Please try different words that are more officiant !';
        }else{
            while($row = mysql_fetch_array($query)){
                $title = $row['title'];
                $description = $row['description'];
                $url = $row['url'];
                
                $output .= "<div><h3><strong>$title</h3></strong><h5>$description</h5>The link to the page is: <a href='$url'>Click Here!</a></div>";
            }
        }
    }
    
?>

<!Doctype html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <title>Search for clubs and societies</title>
    
        <!-- Bootstrap Core CSS -->
        <link href="css/search/Searchbootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/search/Searchbusiness-casual.css" rel="stylesheet">
        <link href="css/search/Search.css" rel="stylesheet">
        
        <script type="text/javascript">
            function goToAnchor() {
              location.href = "search.php#myAnchor";
            }
        </script>
    </head>
    
    <body onload="goToAnchor();">
        
        
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
                                <img class="img-responsive img-full" src="img/search/slideShow1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/search/slideShow2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/search/slideShow3.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/search/slideShow4.jpg" alt="">
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
             <div class="col-lg-12 text-center">      
                <form action="search.php" method="post" >
                    <input type="text" name="search" id="searchBox" maxlength="25" autocomplete="on" placeholder="Search..."/><input type="submit" value=">>"id="searchButton" />
                </form>
                <?php print("$output");?>
            </div>
            </div>
        </div>
    </div>

    
 		</div>
	</div>

    <!-- /.container -->
    <a name="myAnchor"></a>
    <footer>
        <div class="container">
            <div class="row">
              
              
                <div class="col-lg-4 text-left">
                    <p>Copyright &copy; Bdoor & David & Jason & Sumit  2016</p>
                 </div>
                     <div class="add">
                        <div class="col-lg-4 text-center">
            				<a href="https://www.facebook.com/clubsandsocs/?fref=ts"><img src="img//facebook.jpg" alt="" /></a>
            				<a href="https://accounts.google.com"><img src="img//google.jpg" alt="" /></a>
            				<a href="https://twitter.com/NCIRL"><img src="img//twitter.jpg" alt="" /></a>
            				<a href="https://www.youtube.com/user/NCIRL"><img src="img//youtube.jpg" alt="" /></a>
					    </div>
                	</div>
			    <div class="col-lg-4 text-right">
	                 <p id="demo"></p>
	                 <script>
	                 var d = new Date();
	                 document.getElementById("demo").innerHTML = d.toString();
	                 </script>
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