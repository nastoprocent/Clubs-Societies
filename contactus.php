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
            
            $comment=$_POST["comment"];
            
    }
    if($valid==3)
    {
    $conn->query("INSERT INTO contact (name, email, phone ,comment) VALUES ( '".$_POST['name']."', '".$_POST['email']."', '".$_POST['phone']."','".$_POST['comment']."')");
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

    <title>Contact Us</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/contactus/Contactusbootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/contactus/Contactusbusiness-casual.css" rel="stylesheet">
    
    <script language="JavaScript">

    // this are your wrong entered words, check them and change for our contact us
    var swear_words_arr=new Array("shit","fuck","bitch","piss","dick","pussy","cock","fag","asshole","arsehole","bastard","slut","douche","fanny","cunt","faggot","nigga","nigger","motherfucker","muthafucker","knobhead","twat","shitbag","wanker","bollocks","knacker","dickhead","bellend","shite","bumhole","tosser","cuntflaps","slag","gobshite","nutsack","asswipe","arsewipe","choad","shitter","prick","pisswizard");
    
    var swear_alert_arr=new Array;
    var swear_alert_count=0;
    function reset_alert_count()
    {
     swear_alert_count=0;
    }
    function validate_message()
    {
     reset_alert_count();
     var compare_text=document.form1.message.value;
     for(var i=0; i<swear_words_arr.length; i++)
     {
      for(var j=0; j<(compare_text.length); j++)
      {
       if(swear_words_arr[i]==compare_text.substring(j,(j+swear_words_arr[i].length)).toLowerCase())
       {
        swear_alert_arr[swear_alert_count]=compare_text.substring(j,(j+swear_words_arr[i].length));
        swear_alert_count++;
       }
      }
     }
     var alert_text="";
     for(var k=1; k<=swear_alert_count; k++)
     {
      alert_text+="\n" + "(" + k + ")  " + swear_alert_arr[k-1];
     }
     if(swear_alert_count>0)
     { // displaying the words that are being not allowed to use here :
      alert("The form cannot be submitted.\nThe following illegal words were found:\n_______________________________\n" + alert_text + "\n_______________________________");
      document.form1.message.select();
     }
     else
     {
      document.form1.submit();
     }
    }
    function select_area()
    {
     document.form1.message.select();
    }
    window.onload=reset_alert_count;
    //  End -->
    
</script>

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
                    <li><a class="page-scroll" href="clubsoc.php">Clubs&Socs</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="contactus.php">Contact Us</a></li>
                    <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    			     <span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $userRow['userName']; ?>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Navigation menu -->

    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact
                        <strong>Clubs and Societies support </strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-8">
                    <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="642" height="443" src="https://maps.google.com/maps?hl=en&q=National College of Ireland, Mayor Street, IFSC, Dublin 1&ie=UTF8&t=roadmap&z=16&iwloc=B&output=embed"><div><small><a href="http://embedgooglemaps.com">embedgooglemaps.com</a></small></div><div><small><a href="http://buyproxies.io/">buy proxies</a></small></div></iframe>
                </div>
                    <div class="col-md-4"><br><br><br><br><br><br>
                        <p align=left>Phone:
                            <strong>  (01) 449 8500</strong>
                        </p>
                        <p align=lefts>Email:
                            <strong><a href="mailto:name@example.com">ClubsAndSocietiesNCI@gmail.com</a></strong>
                        </p>
                        <p align=left>Address:
                            <strong>Mayor Street, IFSC Dublin 1</strong>
                        </p>
                    </div>
                <div class="clearfix"></div>
            </div>
        </div>
        
        /* <?php
            
              if (isset($_POST['submit']))  {
              
              //Email information
              $to = "someone@example.com";
              $subject="Messgae from $name,$phone.";
              
              $name = $_POST['name'];
              $email = $_POST['email'];
              $phone = $_POST['phone'];
              $comment = $_POST['comment'];
              
              //send email
              mail($to, "$subject", $comment, "From:" . $email);
              
              
              echo "Thank you for contacting us!";
              $page= "admin.php";
                header("Location: $page");
              }
              
              //if variable is not filled out, display the form
              else  {
        ?> 
        */

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact
                        <strong>form</strong>
                    </h2>
                    <hr>
                    <p><h6><center> Please contact us if you have any further questions or problems about our site. We will gladly get back to you.</center></h6></p>
                        <form name="contactform" method="post" action="contactus.php" onSubmit="alert('Thank you for your application!!!!');">
                                <div class="form-group">
                                    <label for="Name" align="left">Name</label>
                                    <input type="text" class="form-control" name="name"  value="<?php echo $userRow['userName']; ?>" <span ><?php $_POST = array() ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input type="text" class="form-control" name="email" value="<?php echo $userRow['userEmail']; ?>" <span ><?php $_POST = array() ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" class="form-control" name="phone" placeholder="08********"  value="<?php if(isset($_POST['phone']) && empty($phoneErr)){ echo $_POST['phone'];} else {echo '';}?>" required maxlength="12" minlength="10"><span class="error"><?php echo $phoneErr; ?><?php $_POST = array() ?></span>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Please describe the problem or question that you have.</label>
                                    <textarea class="form-control" name="comment" rows="6" onclick="select_area()"></textarea>
                                </div>
                    
                        <button type="submit" class="btn btn-primary" onclick="check_val()"; >Submit</button>
                </form>
                </div>
            </div>
        </div>
        </div>

    </div>           
    /*<?php
    }
    ?>*/
    <!-- /.container -->

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

</body>

</html>
<?php ob_end_flush(); ?>