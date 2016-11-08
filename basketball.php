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
                        <img class="img-responsive img-rounded" src="img/wearegamers.jpg" alt="">
                    </div>
                    <div class="col-md-4">
                        <h1>Gaming Society</h1>
                        <p>Welcome to the NCI Gaming Soc page! Our aim to provide students of NCI a competive and fun gaming experience in the college. We will play a variety of games from console gaming platforms such as playstation, Xbox and PC and even retro consoles! 


        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Sign Up</strong>
                    </h2>
                    <hr>
                    <p><h6><center> Please fill in the form for signing up Gaming C&S</center></h6></p>
                    
                        <form class="form-horizontal" action = "savetoxml.php" method = "post">
                            <div class="form-group">
                                  <label class="col-sm-2 control-label">Name</label>
                                  <div class="col-sm-4">
                                    <input class="form-control" id="focusedInput" type="text" required placeholder="E.g John Murphy">
                                  </div>
                            </div>
                            <div class="form-group">
                                  <label class="col-sm-2 control-label">Student Email</label>
                                  <div class="col-sm-6">
                                    <input class="form-control" id="focusedInput" type="text" required  placeholder="x14656423@student.ncirl.ie">
                                  </div>
                            </div>
                            <div class="form-group">
                                  <label class="col-sm-2 control-label">Phone Number</label>
                                  <div class="col-sm-6">
                                    <input class="form-control" id="focusedInput" type="text" required  placeholder="08x xxx xxx">
                                  </div>
                            </div>
                            <div class="form-group" >
                                  <label class="col-sm-2 control-label">DOB</label>
                                  <div class="col-sm-6">
                                    <select name='day' id='dayddl'>
                                            <option value='1'>1</option>
                                            <option value='2'>2</option>
                                            <option value='3'>3</option>
                                            <option value='4'>4</option>
                                            <option value='5'>5</option>
                                            <option value='6'>6</option>
                                            <option value='7'>7</option>
                                            <option value='8'>8</option>
                                            <option value='9'>9</option>
                                            <option value='10'>10</option>
                                            <option value='11'>11</option>
                                            <option value='12'>12</option>
                                            <option value='13'>13</option>
                                            <option value='14'>14</option>
                                            <option value='15'>15</option>
                                            <option value='16'>16</option>
                                            <option value='17'>17</option>
                                            <option value='18'>18</option>
                                            <option value='19'>19</option>
                                            <option value='20'>20</option>
                                            <option value='21'>21</option>
                                            <option value='22'>22</option>
                                            <option value='23'>23</option>
                                            <option value='24'>24</option>
                                            <option value='25'>25</option>
                                            <option value='26'>26</option>
                                            <option value='27'>27</option>
                                            <option value='28'>28</option>
                                            <option value='29'>29</option>
                                            <option value='30'>30</option>
                                            <option value='31'>31</option>
                                        </select>
                                        <select name='month' id='monthddl'>
                                            <option value='1'>January</option>
                                            <option value='2'>Februray</option>
                                            <option value='3'>March</option>
                                            <option value='4'>April</option>
                                            <option value='5'>May</option>
                                            <option value='6'>June</option>
                                            <option value='7'>July</option>
                                            <option value='8'>August</option>
                                            <option value='9'>September</option>
                                            <option value='10'>October</option>
                                            <option value='11'>NOvember</option>
                                            <option value='12'>December</option>
                                            
                                        </select>
                                            
                                        <select name='day' id='blah'>
                                            <option value='1970'>1970</option>
                                            <option value='1971'>1971</option>
                                            <option value='1972'>1972</option>
                                            <option value='1973'>1973</option>
                                            <option value='1974'>1974</option>
                                            <option value='1975'>1975</option>
                                            <option value='1976'>1976</option>
                                            <option value='1977'>1977</option>
                                            <option value='1978'>1978</option>
                                            <option value='1979'>1979</option>
                                            <option value='1980'>1980</option>
                                            <option value='1981'>1981</option>
                                            <option value='1982'>1982</option>
                                            <option value='1983'>1983</option>
                                            <option value='1984'>1984</option>
                                            <option value='1985'>1985</option>
                                            <option value='1986'>1986</option>
                                            <option value='1987'>1987</option>
                                            <option value='1988'>1988</option>
                                            <option value='1989'>1989</option>
                                            <option value='1990'>1990</option>
                                            <option value='1991'>1991</option>
                                            <option value='1992'>1992</option>
                                            <option value='1993'>1993</option>
                                            <option value='1994'>1994</option>
                                            <option value='1995'>1995</option>
                                            <option value='1996'>1996</option>
                                            <option value='1997'>1997</option>
                                            <option value='1998'>1998</option>
                                            <option value='1999'>1999</option>
                                            <option value='2000'>2000</option>
                                            <option value='2001'>2001</option>
                                            <option value='2002'>2002</option>
                                            <option value='2003'>2003</option>
                                            <option value='2004'>2004</option>
                                            <option value='2005'>2005</option>
                                            <option value='2006'>2006</option>
                                            <option value='2007'>2007</option>
                                            <option value='2008'>2008</option>
                                            <option value='2009'>2009</option>
                                            <option value='2010'>2010</option>
                                            <option value='2011'>2011</option>
                                            <option value='2012'>2012</option>
                                            <option value='2013'>2013</option>
                                            <option value='2014'>2014</option>
                                            <option value='2015'>2015</option>
                                            <option value='2016'>2016</option>
                                        </select>
                                  </div>
                            </div>
                            
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
                <form name="myform" method="post" action="clubsoc.php" onSubmit="alert('Thank you for your application!!!!');">
                    <div class="form-group">
                        <label for="Name">Name</label>
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
                        <textarea class="form-control" type="text" name="questions" rows="4" value="<?php $_POST = array() ?>"></textarea>
                        
                        <small id="emailHelp" class="form-text text-muted">We'll never share your information with anyone else.</small>
                        
                    </div>
                        <button type="submit" class="btn btn-primary" >Submit</button>
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