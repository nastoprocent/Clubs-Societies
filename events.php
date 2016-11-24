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

    <link href="css/events/Eventsbootstrap.min.css" rel="stylesheet">
    <link href="css/events/Eventsbusiness-casual.css" rel="stylesheet">
  	<link href="css/events/Eventsstyle.css" rel="stylesheet">
  	 
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/addingajax.js"></script>
    <script src="js/jquery.min.js"></script>
     
    <style>
        * {
          box-sizing: border-box;
        }
        
        #myInput {
          background-image: url('../../img/events/searchicon.png');
          background-position: 10px 10px;
          background-repeat: no-repeat;
          width: 100%;
          font-size: 16px;
          padding: 12px 20px 12px 40px;
          border: 1px solid #ddd;
          margin-bottom: 12px;
        }
        
        #myTable {
          border-collapse: collapse;
          width: 90%;
          border: 1px solid #ddd;
          font-size: 18px;

          
        }
        
        #myTable th, #myTable td {
          text-align: left;
          padding: 12px;
          overflow: auto;
        }
        
        #myTable tr {
          border-bottom: 1px solid #ddd;
          overflow: auto;
        }
        
        #myTable tr.header, #myTable tr:hover {
          background-color: #f1f1f1;
          overflow:auto;
        }
        
        div.scroll {
        width: 350px;
        height: 420px;
        overflow: scroll;
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
                <div class="col-md-8">
                    <div id="calendar_div">
                	    <?php echo getCalender(); ?>
                    </div>
                </div>
                    <div class="col-md-4">
                            <h2> Clubs & Socs Lists</h2>
                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                             <div class="scroll">
                            <table id="myTable">
                              <tr class="header">
                                <th style="width:60%;">Clubs</th>
                                <th style="width:40%;">Socs</th>
                              </tr>
                              <tr>
                                <td>Badminton</td>
                                <td>Music</td>
                              </tr>
                              <tr>
                                <td>Baketball</td>
                                <td>Art</td>
                              </tr>
                              <tr>
                                <td>Chess</td>
                                <td>Gaming</td>
                              </tr>
                              <tr>
                                <td>Gaelic Football</td>
                                <td>Fashion</td>
                              </tr>
                              <tr>
                                <td>Golf</td>
                                <td>Dance</td>
                              </tr>
                              <tr>
                                <td>Hurling</td>
                                <td>Computing</td>
                              </tr>
                              <tr>
                                <td>Pool and Snooker</td>
                                <td>Christian Union</td>
                              </tr>
                               </tr>
                              <tr>
                                <td>Hockey</td>
                                <td>Comdedy</td>
                              </tr>
                               </tr>
                              <tr>
                                <td>Karting</td>
                                <td>Darts</td>
                              </tr>
                               </tr>
                              <tr>
                                <td>Soccer</td>
                                <td>Fantasy Football</td>
                              </tr>
                              <tr>
                                <td>Table Tennis</td>
                                <td>Peer Mentor</td>
                              </tr>
                              <tr>
                                <td>Tennis</td>
                                <td>Reachout</td>
                              </tr>
                              <tr>
                                <td>Unlimate Frisbee</td>
                                <td>Xbox</td>
                              </tr>
                            </table>
                            
                            <script>
                                    function myFunction() {
                                      var input, filter, table, tr, td, i;
                                      input = document.getElementById("myInput");
                                      filter = input.value.toUpperCase();
                                      table = document.getElementById("myTable");
                                      tr = table.getElementsByTagName("tr");
                                      for (i = 0; i < tr.length; i++) {
                                        td = tr[i].getElementsByTagName("td")[0];
                                        if (td) {
                                          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].style.display = "";
                                          } else {
                                            tr[i].style.display = "none";
                                          }
                                        }
                                      }
                                    }
                        </script>
                    </div>
                    </div>
                <div class="clearfix"></div>
        	</div>
 		</div>
	</div>

    <!-- /.footer -->
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
</body>

</html>
<?php ob_end_flush(); ?>