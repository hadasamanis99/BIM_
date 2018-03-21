<?php

 ob_start();
 session_start();

 require_once 'actions/db_connect.php';

 // it will never let you open index(login) page if session is set

 if (isset($_SESSION['users'])!="" ) {
  header("Location: home.php");
  exit;
 }

 $error = false;
 $email = "";
 $pass = "";
 $name = "";
 $nameError ="";
 $emailError = "";
 $passError = "";

 if( isset($_POST['login']) ) {
  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  // prevent sql injections / clear user invalid inputs

  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  }

 

  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }

 

  // if there's no error, continue to login

  if (!$error) {
   //$password = hash('sha256', $pass); // password hashing using SHA256
    $res=mysqli_query($conn, "SELECT userId, userName, userPass FROM admin WHERE userEmail='$email'");
   $row = mysqli_fetch_assoc($res, MYSQLI_ASSOC);
   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

   echo $email;
   echo $pass;
   
   $password = hash('sha256', $pass);
   if( $count != 1 ) {
	$errMSG = "This email is not registered";
  } else if ($row['pass']==$password) {
	$_SESSION['users'] = $row['userId'];
	header("Location: home.php");
  } else {
	$errMSG = "Incorrect Password, Try again...";
  }
  echo $password;
}
}

// SIGN UP =====================================================================

if( isset($_SESSION['user'])!="" ){
	header("Location: hotels.php"); // redirects to home.php
   }
   
  $error = false;
  $email = "";
  $name = "";
  $nameError ="";
  $emailError = "";
  $passError = "";
   if ( isset($_POST['btn-signup']) ) {
   
	// sanitize user input to prevent sql injection
	$name = trim($_POST['name']);
	$name = strip_tags($name);
	$name = htmlspecialchars($name);
   
	$email = trim($_POST['email']);
	$email = strip_tags($email);
	$email = htmlspecialchars($email);
   
	$pass = trim($_POST['pass']);
	$pass = strip_tags($pass);
	$pass = htmlspecialchars($pass);
   
	// basic name validation
   
	if (empty($name)) {
	 $error = true;
	 $nameError = "Please enter your full name.";
	} else if (strlen($name) < 3) {
	 $error = true;
	 $nameError = "Name must have at least 3 characters.";
	} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
	 $error = true;
	 $nameError = "Name must contain alphabets and space.";
	}
   
	//basic email validation
	if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
	 $error = true;
	 $emailError = "Please enter valid email address.";
	} else {
	 // check whether the email exist or not
	 $query = "SELECT userEmail FROM admin WHERE userEmail='$email'";
	 $result = mysqli_query($conn, $query);
	 $count = mysqli_num_rows($result);
	 if($count!=0){
	  $error = true;
	  $emailError = "Provided Email is already in use.";
	 }
	}
	// password validation
	if (empty($pass)){
	 $error = true;
	 $passError = "Please enter password.";
	} else if(strlen($pass) < 6) {
	 $error = true;
	 $passError = "Password must have at least 6 characters.";
	}
   
	// password encrypt using SHA256();
	$password = hash('sha256', $pass);
   
	// if there's no error, continue to signup
	if( !$error ) {
   
	 $query = "INSERT INTO admin(name,email,pass) VALUES('$name','$email','$password')";
	 $res = mysqli_query($connect, $query);
   
	 if ($res) {
	  $errTyp = "success";
	  $errMSG = "Successfully registered, you may login now";
	  unset($name);
	  unset($email);
	  unset($pass);
	 } else {
	  $errTyp = "danger";
	  $errMSG = "Something went wrong, try again later...";
	 }
	}
   }

 ?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" lang="en">
  <title>Sign In</title>
  <link rel="stylesheet" href="css/style_log.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
        <link rel="shortcut icon" type="image/x-icon" href="images/umbrella.ico">
</head>

	<body class="login-body">
		<div class="row">
			<div class="input-cart col s12 m10 push-m1 z-depth-2 grey lighten-5" >
				<div class="col s12 m5 login">
					<h4 class="center">Log in</h4>
					  <br>
					  <?php
						if ( isset($errMSG) ) {
							echo $errMSG; 
						}   ?>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off">
						<div class="row">
							<div class="input-field">
                   				 <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php $email; ?>" maxlength="40" />
							</div>
						</div>
						<div class="row">
							<div class="input-field">
                				<input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
							</div>
						</div>
						<div class="row">
							<div class="switch col s6">
								<label>
									<input type="checkbox">
									<span class="lever"></span>
									Remember Me
								</label>
							</div>
							<div class="col s6">
								<button type="submit" name="login" class="btn waves-effect waves-light blue right">Log in</button>
							</div>
						</div>
					</form>
				</div>







  			<!-- Signup form -->
				<div class="col s12 m7 signup">
				<div class="signupForm">
					<h4 class="center">Sign up</h4>
					<br>
					<?php
						if ( isset($errMSG) ) {
							echo $errMSG; 
						}   ?>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
						<div class="row">
							<div class="input-field col s12 m6">
								<input type="text" name="name1" class="form-control" placeholder="First Name" maxlength="50" />
                				<br />
								<label for="name">First Name</label>
							</div>

							<div class="input-field col s12 m6">
								<input type="email" name="email1" class="form-control" placeholder="Last Name" maxlength="40"  />
								<label for="pass">Last Name</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12 m6">
								<input type="email" name="email1" class="form-control" placeholder="Enter Your Email" maxlength="40"  />
								<label for="pass">Email</label>
							</div>
							<div class="input-field col s12 m6">
								<div class="col s12">
                  					<input type="password" name="pass1" class="form-control" placeholder="Enter Password" maxlength="15" />
									<label for="email">Your Password</label>
								</div>
							</div>
						</div>

					<div class="row">
             			<button type="submit" class="btn blue right waves-effect waves-light" name="btn-signup">Sign Up</button>

             </form>
             
					</div>
					</div>
					<div class="signup-toggle center" >
						<h4 class="center">Have No Account ? <a href="#!">Sign Up Here...</a></h4>
					</div>
				</div>
				<div class="col s12">
					<br>
          <div class="legal center">
					</div>
					<div class="legal center">
					<div class="col s12 m5">

					</div>
					</div>

				</div>
			</div>
		</div>





		<div class="fixed-action-btn toolbar">

			<ul>
				<li><a class="indigo center" href="#!">Login with FB</a></li>
				<li><a class="blue center" href="#!">Login with Twitter</a></li>
				<li><a class="red center" href="#!">Login with Google +</a></li>
			</ul>
		</div>	<!-- script -->
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"
			  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
			  crossorigin="anonymous"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script><script src="asset/js/init.js"></script>


    <script src="js/index.js"></script>



<!-- HTTPS required. HTTP will give a 403 forbidden response -->
<script src="https://sdk.accountkit.com/en_US/sdk.js"></script>



</body>
</html>
<?php ob_end_flush(); ?>
