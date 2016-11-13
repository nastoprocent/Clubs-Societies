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

    <title>Music</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/music/Musicbootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/music/Musicbusiness-casual.css" rel="stylesheet">
    <link href="css/events/Eventsslideshow.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="js/jssor.slider-21.1.6.mini.js" type="text/javascript"></script>

</head>



<body> 

<script type="text/javascript">
        jQuery(document).ready(function ($) {

            var jssor_1_SlideshowTransitions = [
              {$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$Jease$.$InWave,$Top:$Jease$.$InWave,$Clip:$Jease$.$OutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
              {$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.1,0.9],$Top:[0.1,0.9]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$Jease$.$InJump,$Top:$Jease$.$InJump,$Clip:$Jease$.$OutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
              {$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$Jease$.$InWave,$Top:$Jease$.$InWave,$Clip:$Jease$.$OutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
              {$Duration:1500,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Easing:{$Left:$Jease$.$InJump,$Top:$Jease$.$InJump,$Clip:$Jease$.$OutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
              {$Duration:1800,x:1,y:0.2,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2050,$Easing:{$Left:$Jease$.$InOutSine,$Top:$Jease$.$OutWave,$Clip:$Jease$.$InOutQuad},$Outside:true,$Round:{$Top:1.3}},
              {$Duration:1000,$Delay:30,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2049,$Easing:$Jease$.$OutQuad},
              {$Duration:1000,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Easing:$Jease$.$OutQuad},
              {$Duration:1000,y:-1,$Cols:12,$Formation:$JssorSlideshowFormations$.$FormationStraight,$ChessMode:{$Column:12}},
              {$Duration:1000,x:-0.2,$Delay:40,$Cols:12,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:260,$Easing:{$Left:$Jease$.$InOutExpo,$Opacity:$Jease$.$InOutQuad},$Opacity:2,$Outside:true,$Round:{$Top:0.5}},
              {$Duration:2000,y:-1,$Delay:60,$Cols:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:$Jease$.$OutJump,$Round:{$Top:1.5}}
            ];

            var jssor_1_options = {
              $AutoPlay: true,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 880);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            /*responsive code end*/
        });
    </script>
    

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
    <!-- Slide show menu -->
    <div class="container">
     	<div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <hr>
                            <h2 class="brand-before">
                                <small>Welcome to</small>
                            </h2>
        
                            <h1 class="brand-name"> Music Society</h1>
                            <hr class="tagline-divider">

                   <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden; visibility: hidden;">
                        <!-- Loading Screen -->
                        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                            <div style="position:absolute;display:block;background:url('img/events/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                        </div>
                        
                        
                        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden;">
                            <div data-p="112.50">
                                <img data-u="image" src="img/music/musicslide2.jpg" />
                            </div>
                            <a data-u="any" href="http://www.jssor.com" style="display:none">Banner Rotator</a>
                            <div data-p="112.50" style="display: none;">
                                <img data-u="image" src="img/music/musicslide1.jpg" />
                            </div>
                            <div data-p="112.50" style="display: none;">
                                <img data-u="image" src="img/music/musicslide3.jpg" />
                            </div>
                            <div data-p="112.50" style="display: none;">
                                <img data-u="image" src="img/music/musicslide4.jpg"  />
                            </div>
                        </div>
                        <!-- Bullet Navigator -->
                        <div data-u="navigator" class="jssorb01" style="bottom:16px;right:16px;">
                            <div data-u="prototype" style="width:12px;height:12px;"></div>
                        </div>
                        <!-- Arrow Navigator -->
                        <span data-u="arrowleft" class="jssora05l" style="top:0px;left:8px;width:40px;height:40px;" data-autocenter="2"></span>
                        <span data-u="arrowright" class="jssora05r" style="top:0px;right:8px;width:40px;height:40px;" data-autocenter="2"></span>
                    </div>
                    <!-- #endregion Jssor Slider End -->

                </div>
            </div>
        </div>
        <!-- Slide show menu -->
        
        <!-- Heading Row -->
            <div class="row">
                <div class="box">
                    <div class="col-md-8">
                        <img class="img-responsive img-rounded" src="img/music/music.jpg" alt="">
                    </div>
                    <div class="col-md-4">
                        <h1> Music Society</h1>
                        <p>Welcome to the NCI Music Soc page! Our aim to provide students of NCI a competive and fun gaming experience in the college. We will play a variety of games from console gaming platforms such as playstation, Xbox and PC and even retro consoles! 

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
            <div class="box" align="center">
                <hr>
                    <h2 class="intro-text text-center">
                        <strong>Sign Up</strong>
                    </h2>
                    <hr>
                    <p><h6><center> Please fill in the form if you want to sign up for Music Society</center></h6></p>
                <form name="myform" method="post" action="clubsoc.php" onSubmit="alert('Thank you for your application!!!!');">
                    <div class="form-group">
                        <label for="Name" align="left">Name</label>
                        <input type="text" class="form-control" name="name" disabled value="<?php echo $userRow['userName']; ?><?php if(isset($_POST['name']) && empty($nameErr)){ echo $_POST['name'];} else {echo '';}?>" required><span class="error"><?php echo $nameErr; ?><?php $_POST = array() ?></span>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="text" class="form-control" name="email" disabled value="<?php echo $userRow['userEmail']; ?><?php if(isset($_POST['email']) && empty($emailErr)){ echo $_POST['email'];} else {echo '';}?>" required><span class="error"><?php echo $emailErr; ?><?php $_POST = array() ?></span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" name="phone"  value="<?php if(isset($_POST['phone']) && empty($phoneErr)){ echo $_POST['phone'];} else {echo '';}?>" required maxlength="12" minlength="10"><span class="error"><?php echo $phoneErr; ?><?php $_POST = array() ?></span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Society</label>
                        <input type="text" class="form-control" name="society"  placeholder="Music" disabled value="<?php if(isset($_POST['socity']) && empty($phoneErr)){ echo $_POST['phone'];} else {echo '';}?>" required maxlength="12" minlength="10"><span class="error"><?php echo $phoneErr; ?><?php $_POST = array() ?></span>
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
                    <div class="add">
						<a href="https://www.facebook.com/NciMusicSoc/?fref=ts"><img src="img//facebook.jpg" alt="" /></a>
						<a href="https://accounts.google.com"><img src="img//google.jpg" alt="" /></a>
						<a href="https://twitter.com/NCIRL"><img src="img//twitter.jpg" alt="" /></a>
						<a href="https://www.youtube.com/user/NCIRL"><img src="img//youtube.jpg" alt="" /></a>
					</div>
                </div>
            </div>
        </div>
    </footer>
    
</body>

</html>
<?php ob_end_flush(); ?>