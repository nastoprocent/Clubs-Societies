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
		
			$servername="localhost";
			$username="root";
			$password="";
			$conn = new mysqli($servername, $username, $password, 'clubsandsocs');
			if ($conn->connect_error)
			{
				die("Connection failed: " . $conn->connect_error);
			}
			
			
        $nameErr = $dateofbirthErr = $emailErr = $phoneErr = "";
        $name = $dateofbirth = $email = $phone = $questions = "";
        function test_data($data)
        {
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }
        $errors = array();
        $valid=0; 
        if ( $_SERVER["REQUEST_METHOD"] =="POST" )
        {
            $name=$_POST["name"];
            if( empty($name) )
            {
                $nameErr = "Please Enter your Name";
                $errors[]= $nameErr ;
            }
            else
            {
                if( !preg_match("/^[a-zA-Z ]*$/",$name) )
                {
                    $nameErr = "Wrong characters in the Name";
                    $errors[]= $nameErr ;
                }
                else
                {
                    $name=test_data($name);
                    $valid++;

                }
            }
            $dateofbirth=$_POST["dateofbirth"];
            if( empty($dateofbirth) )
            {
                $dateofbirthErr = "Please Enter your Date of Birth";
                $errors[]= $dateofbirthErr ;
            }
            else
            { 
                $dateofbirth=test_data($dateofbirth);
                $valid++;
            }
            $email=$_POST["email"];
            if( empty($email) )
            {
                $emailErr = "Please Enter Email Address";
                $errors[]= $emailErr ;
            }
            else
            {
                if( !filter_var($email, FILTER_VALIDATE_EMAIL) )
                {
                    $emailErr = "Invalid Email Address";
                    $errors[]= $emailErr ;
                }
                else
                {
                    $email=test_data($email);
                    $valid++;
                }   
            }       
            $phone=$_POST["phone"];
            if( empty($phone) )
            {
                $phoneErr = "Please Enter Phone Number";
                $errors[]= $phoneErr ;
            }
            else
            { 
                if( !preg_match("/^[0-9]*$/",$phone ) )
                {
                    $phoneErr = "Invalid Phone number";
                    $errors[]= $phoneErr ;
                }
                else
                {
                    $phone=test_data($phone);
                    $valid++;
                }   
            }
    }
    if($valid==4)
    {
    $conn->query("INSERT INTO details (name, dateofbirth, email, phone, questions ) VALUES ( '".$_POST['name']."', '".$_POST['dateofbirth']."', '".$_POST['email']."', '".'0'.$_POST['phone']."', '".$_POST['questions']."')");
    $conn->close();

    }
    ?>
    
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Basket Ball</title>

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
                                <img class="img-responsive img-full" src="img/BB1.jpg" alt="" height="500px">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/BB2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/BB3.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/BB4.jpg" alt="">
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

                    <h1 class="brand-name">BasketBall Society</h1>
                    <hr class="tagline-divider">

                </div>
            </div>
        </div>
        <!-- Slide show menu -->
        
        <!-- Heading Row -->
            <div class="row">
                <div class="box">
                    <div class="col-md-8">
                        <img class="img-responsive img-rounded" src="img/pool4.jpg" alt="">
                    </div>
                    <div class="col-md-4">
                        <h1>BasketBall Society</h1>
                        <p>Welcome to the NCI BasketBall Society page! Our aim to provide students of NCI a fun BasketBall experience in the college as well as competing against other colleges in tournaments.  

                            Any suggestions or ideas please feel free to post it on our group page. Your feedback is important as it's your society!
                             </p>
                    </div>
                </div>
            </div>
        <!-- Heading Row -->
        
        <!-- Content Row -->
            <div class="row">
                <div class="box">
                    <div class="col-md-4">
                        <names></names><br /><br />
                        <img border="0" src="clubsandsocsreps/BasketBall/#.jpg" height="350"></img>
                        <br /><br />
                        <p><strong>President:</strong> ABC</p>
                    </div>
                    <div class="col-md-4">
                        <names></names><br /><br />
                        <img border="0" src="clubsandsocsreps/BasketBall/#.jpg" height="350"></img>
                        <br /><br />
                        <p><strong>Vice President:</strong> JKL</p>
                    </div>
                    <div class="col-md-4">
                        <names></names><br /><br />
                        <img border="0" src="clubsandsocsreps/BasketBall/#.jpg" height="350"></img>
                        <br /><br />
                        <p><strong>Creator of FB-Fanpage: </strong>XYZ</p>
                    </div>
                </div>
            </div>
        
        <!-- Content Row -->
        
    	<div class="row">
            <div class="box" align="center">
                <form name="myform" method="post" action="clubsoc.php" onSubmit="alert('Thank you for your application!!!!');">
                    <div class="form-group">
                        <label for="Name" align="left">Name</label>
                        <input type="text" class="form-control" name="name" value="<?php if(isset($_POST['name']) && empty($nameErr)){ echo $_POST['name'];} else {echo '';}?>" required><span class="error"><?php echo $nameErr; ?><?php $_POST = array() ?></span>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="text" class="form-control" name="email" value="<?php if(isset($_POST['email']) && empty($emailErr)){ echo $_POST['email'];} else {echo '';}?>" required><span class="error"><?php echo $emailErr; ?><?php $_POST = array() ?></span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" name="phone" value="<?php if(isset($_POST['phone']) && empty($phoneErr)){ echo $_POST['phone'];} else {echo '';}?>" required maxlength="12" minlength="10"><span class="error"><?php echo $phoneErr; ?><?php $_POST = array() ?></span>
                    </div>
                    <div class="form-group">
                        <label for="Date">Date of Birth</label>
                        <input class="form-control" type="text" name="dateofbirth" value="<?php if(isset($_POST['dateofbirth']) && empty($dateofbirthErr)){ echo $_POST['dateofbirth'];} else {echo '';}?>" required><span class="error"><?php echo $dateofbirthErr; ?><?php $_POST = array() ?></span>
                    </div>
                    <div class="form-group">
                        <label for="questions">Questions</label>
                        <textarea id="filterta" class="form-control" type="text" name="questions" rows="4" value="<?php $_POST = array() ?>"></textarea>
                        
                        <small id="emailHelp" class="form-text text-muted">We'll never share your information with anyone else.</small>
                        
                    </div>
                        <button type="submit" class="btn btn-primary" onclick="check_val()"; >Submit</button>
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

<!-- Javascript Word Filter -->
<script type="text/javascript">
function check_val()
{
 var bad_words=new Array("death","kill","murder","cornflakes with oranges");
 var check_text=document.getElementById("filterta").value;
 var error=0;
 for(var i=0;i<bad_words.length;i++)
 {
  var val=bad_words[i];
  if((check_text.toLowerCase()).indexOf(val.toString())>-1)
  {
   error=error+1;
  }
 }
	
 if(error>0)
 {
  alert("Some Bad Words In Your Text!");
  window.stop();
 }
}
</script>


</html>
<?php ob_end_flush(); ?>