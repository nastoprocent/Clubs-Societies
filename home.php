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
<html>
  <head>
    
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1.0,  minimum-scale=1.0"> 
      <meta name="description" content="">
      <meta name="author" content="">
      
      <title>Clubs and Societies</title>
      
      <link rel="stylesheet" href="css/home/Homebootstrap.css" type="text/css"  />
      <link href="css/home/Homestylish-portfolio.css" rel="stylesheet">
      <link href="css/home/Homeagency.css" rel="stylesheet">
      
     
      
  </head>
<body>

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
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    			          <span class="glyphicon glyphicon-user"></span> <?php echo $userRow['userName']; ?><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 


      <div class="header">
        <div class="row">
          <div class="col-sm-4 col-lg-4 col-md-4">
      		  <br>
      		     <div class="homebox" align="center" >
                <?php
             	    $conn = new mysqli("localhost", "root", "", "phpmyadmin");
                  // Check connection
                  if ($conn->connect_error) {
                       die("Connection failed: " . $conn->connect_error);
                  } 
             	 
                      $text = "SELECT `id`, `title`, `date` FROM events limit 3";
                      $result = $conn->query($text);
                      
                      if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                              
                              /*echo "Posted on: " . date("Y/m/d") . "<br>";*/
                              echo "<br><div class='design'><div class='id'>News Feed: " . $row["id"]. "</div><br><div class='comment'>" . $row["title"]. "<br><br>Date the event is on: " .$row["date"] ."</div><br></div><br>";
                              
                          }
                      } else {
                          echo "0 results";
                      }
                      $conn->close();
                ?>
              </div>
          </div>
          
            <div class="col-sm-4 col-lg-4 col-md-4"> 
                  <br />
                  <div class="fontdesign">
                    <h1>Welcome to NCI</h1>
                    <h3>Clubs and Societies website</h3>
                  </div>
                   <br />
                   <br />
                   <center>
                  <a href="clubsoc.php" class="findoutmore">Find Out More</a>
                  </center>
                 
            </div>
            
             <div class="col-sm-4 col-lg-4 col-md-4">
      		  <br>
      		     <div class="homebox" align="center" >
                <?php
             	    $conn = new mysqli("localhost", "root", "", "phpmyadmin");
                  // Check connection
                  if ($conn->connect_error) {
                       die("Connection failed: " . $conn->connect_error);
                  } 
             	 
                      $text = "SELECT `id`, `title`, `date` FROM events WHERE id IN(4,5,6) limit 3";
                      $result = $conn->query($text);
                      
                      if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                              
                              /*echo "Posted on: " . date("Y/m/d") . "<br>";*/
                              echo "<br><div class='design'><div class='id'>News Feed: " . $row["id"]. "</div><br><div class='comment'>" . $row["title"]. "<br><br>Date the event is on: " .$row["date"] ."</div><br></div><br>";
                              
                          }
                      } else {
                          echo "0 results";
                      }
                      $conn->close();
                ?>
              </div>
          </div>
              
          </div>
        </div> 
     
      
     
    
    <script src="js/jquery-1.11.3-jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    
</body>
</html>
<?php ob_end_flush(); ?>