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
    <link href="css/clubsoc/ClubSocbootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/clubsoc/ClubSocbusiness-casual.css" rel="stylesheet">
    <link href="css/clubsoc/ClubSocstyle.css" rel="stylesheet">
	
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
			        <li><a href="home.php">Home</a></li>
			        <li class="dropdown">
			          <a class="dropdown-toggle" data-toggle="dropdown" href="clubsoc">Clubs&Socs<span class="caret"></span></a>
			          <ul class="dropdown-menu">
			          	<br>
			            <li><a href="basketball.php">Basketball</a></li>
			            <hr>
			            <li><a href="pool.php">Pool</a></li>
			            <hr>
			            <li><a href="gaming.php">Gaming</a></li>
			            <hr>
			            <li><a href="music.php">Music</a></li>
			            <hr>
			            <li><a href="netSoc.php">NCI NETSOC</a></li>
			            <hr>
			            <li><a href="Anime.php">Anime and Manga</a></li>
			            <br>
			          </ul>
			        </li>
			        <li><a href="events.php">Events</a></li> 
			        <li><a href="contactus.php">Contact Us</a></li>
			        <li><div id="box"><form action="search.php" method="post" onclick="ScrollToBottom()">
           			<input type="text" name="search" id="searchBox" maxlength="25" autocomplete="on" placeholder="Search..."/></form></div></li>
			         
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

                    <h1 class="brand-name">Clubs and Societies</h1>
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
                        <strong>Clubs and Societies</strong>
                    </h2>
                    <hr>
                </div>
	
    <div class="col-sm-4 text-center">
    	<!-- Societies and Clubs 1 -->

	    <div id="img">
    		<div class="hovereffect">
    			<img class="img-responsive" src="img/clubsoc/basketball.jpg" alt="Society or Club" border="5">
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
					 </br>
					 	<li><strong>President: </strong>Gary Barron</li></br>
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
    			<img class="img-responsive" src="img/clubsoc/pool.jpg" alt="Society or Club" border="5">
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
					 </br>
						<li><strong>Vice President: </strong>Jim Maguire</li></br>
						<li><strong>Co-President:</strong> Cillian John Murray</li></br>
						<li><strong>Creator of FB-Fanpage: </strong>Ben Kibabu</li></br>
					</ul>
				</div>
		</div>
		
			</br>
			</br>
			</br>
		<!-- Societies and Clubs 2 -->
		<!-- Societies and Clubs 3 -->
		<div id="img">
    		<div class="hovereffect">
    			<img class="img-responsive" src="img/clubsoc/anime.jpg" alt="Society or Club" border="5">
    			<div class="overlay">
         			<h2> Anime and Manga </h2>
        			<a class="info" href="Anime.php">Find out More</a>
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
				<a href="Anime.php" target="_blank">Anime and Manga</a>
				</h3>
			</div>
			<div class="elements" id="one3">
				<ul>
					 </br>
					 	<li><strong>Co-President: </strong>Pau-Pau Anicete </li></br>
						<li><strong>Creator of FB-Fanpage: </strong>Renalyn Aganon </li></br>
					</ul>
			</div>

		</div>
			</br>
			</br>
			</br>
			
	</div>
	<!-- Societies and Clubs 3 -->





	<!-- Societies and Clubs list 4 -->
	<div class="col-sm-4 text-center">
		
		<div id="img">
    		<div class="hovereffect">
    			<img class="img-responsive" src="img/clubsoc/music.jpg" alt="Society or Club" border="5">
    			<div class="overlay">
         			<h2>Music Society</h2>
        			<a class="info" href="music.php">Find out More</a>
    			</div>
    		</div>
    	</div>
    	
		<div class="food">
				<div class="thelabel" id="thelabel4">
					<div id="one4plus" class="control">
					<a href="#name" onclick="expand('one4');return false">▼</a>
					</div>
					<div id="one4negative" class="control">
					<a href="#name" onclick="collapse('one4');return false">▲</a>
					</div>

					<h3 class="name">
					<a href="music.php" target="_blank">Music Society</a>
					</h3>
				</div>
				<div class="elements" id="one4">
					<ul>
					 </br>
					 	<li><strong>President: </strong>Eve O'Conner</li></br>
					</ul>
				</div>
		</div>
			</br>
			</br>
			</br>
		<!-- Societies and Clubs list 4 -->

	<!-- Societies and Clubs list 5 -->
	
		
				<div id="img">
		    		<div class="hovereffect">
		    			<img class="img-responsive" src="img/clubsoc/gaming.jpg" alt="Society or Club" border="5">
		    			<div class="overlay">
		         			<h2>Gaming Society</h2>
		        			<a class="info" href="gaming.php">Find out More</a>
		    			</div>
		    		</div>
		    	</div>
    	<div class="food">
				<div class="thelabel" id="thelabel4">
					<div id="one5plus" class="control">
					<a href="#name" onclick="expand('one5');return false">▼</a>
					</div>
					<div id="one5negative" class="control">
					<a href="#name" onclick="collapse('one5');return false">▲</a>
					</div>
					
					<h3 class="name">
					<a href="gaming.php" target="_blank">Gaming Society</a>
					</h3>
				</div>
				<div class="elements" id="one5">
					<ul>
					 </br><li><strong>Co-President:</strong> Cillian John Murray</li></br>
						<li><strong>Vice President:</strong> Jim Maguire</li></br>
						<li><strong>Creator of FB-Fanpage: </strong>Ben Kibabu</li></br>
					</ul>
				</div>
		</div>
			</br>
			</br>
			</br>
			<!-- Societies and Clubs list 5 -->
			<!-- Societies and Clubs list 6 -->
				<div id="img">
		    		<div class="hovereffect">
		    			<img class="img-responsive" src="img/clubsoc/Net.jpg" alt="Society or Club" border="5">
		    			<div class="overlay">
		         			<h2>NCI NET Society</h2>
		        			<a class="info" href="netSoc.php">Find out More</a>
		    			</div>
		    		</div>
		    	</div>
    	<div class="food">
				<div class="thelabel" id="thelabel4">
					<div id="one6plus" class="control">
					<a href="#name" onclick="expand('one6');return false">▼</a>
					</div>
					<div id="one6negative" class="control">
					<a href="#name" onclick="collapse('one6');return false">▲</a>
					</div>
					
					<h3 class="name">
					<a href="netSoc.php" target="_blank">NCI NET Society</a>
					</h3>
				</div>
				<div class="elements" id="one6">
					<ul>
					 </br><li><strong>Co-President:</strong> David Kelly</li></br>
					</ul>
				</div>
		</div>
			</br>
			</br>
			</br>
			<!-- Societies and Clubs list 6 -->
	</div>
			
			
    </div>
    

                <div class="clearfix"></div>

         	   	</div>
        	</div>
 		</div>
	</div>

    <!-- /.copy right/footer -->

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