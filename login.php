<?php

?>
<!DOCTYPE html>
<html>
<head>
        <title>Login Page</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="abc.css">
        <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME CSS -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet" />
     <!-- FLEXSLIDER CSS -->
<link href="assets/css/flexslider.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />    
  <!-- Google	Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
    
      </head>
<body>

<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location:dashboard.html"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}  
    }else{
?>
  <div class="navbar navbar-inverse navbar-fixed-top " id="menu">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img class="logo-custom" src="assets/img/logo180-501.png" alt=""  /></a>
            </div>
            <div class="navbar-collapse collapse move-me">
                <ul class="nav navbar-nav navbar-right">
                    <li ><a href="#home">HOME</a></li>
                     <li><a href="#features-sec">FEATURES</a></li>
                    <li><a href="#faculty-sec">FACULTY</a></li>
                    <li><a href="#student-sec">STUDENT</a></li>
                     <li><a href="#course-sec">COURSES</a></li>
                     <li><a href="#contact-sec">CONTACT</a></li>
                     <li><a href="registration.php">SIGNUP</a></li>
                      <li><a href="login.php">LOGIN</a></li>
                </ul>
            </div>
           
        </div>
    </div>
      <!--NAVBAR SECTION END-->
     
    </div>
                
               </div>
                </div>
           </div>
           
       </div>
       <!--HOME SECTION END-->   
       <br>
       <br>
       <br>
       <br>
   <center>
<div class="form">
    <br>
 <h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
</br>
<br>
<input type="password" name="password" placeholder="Password" required /><br>
       </div>
    </br>
<input name="submit" type="submit" value="Login" />
</form>
    <p>Not registered yet? <a href='registration.php'>Register Here</a></p>

<br /><br />

</div>
    </center>
    </br>
    <br>
    <br>
    <br>
 <div id="footer">
         <center>
          &copy 2018 <a href="index.html" style="color: #fff" target="_blank">findtutor.com </a>| All Rights Reserved |  Design by : Jayesh Singh & Akash kumar  
         </center>
    </div>
<?php } ?>


</body>
</html>
