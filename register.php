
<?php

  ob_start();

  session_start(); // start a new session or continues the previous

  if( isset($_SESSION['admin'])!="" ){
    header("Location: home.php"); // redirects to home.php
  }

  //to insurt the dbconnect.php
  include_once 'actions/db_connect.php';

  $error = false;
  $email = "";
  $name = "";
  $nameError ="";
  $emailError = "";
  $passError = "";
  // $conn = "";
  


  if ( isset($_POST['btn-signup']) ) {

      // sanitize user input to prevent sql injection
    $name = trim($_POST['name']);
    $name = strip_tags($name);    //schutz for fremdangriffen (code/sql)
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
        $nameError = "Name must have atleat 3 characters.";
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
    } else if(strlen($pass) < 5) {
        $error = true;
        $passError = "Password must have atleast 6 characters.";
    }
    
    // password encrypt using SHA256();
    $password = hash('sha256', $pass);

    // if there's no error, continue to signup
    if( !$error ) {
        $query = "INSERT INTO admin (userName, userEmail, userPass,users) VALUES ('$name', '$email', '$password',1)";
        $res = mysqli_query($conn, $query);

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
    <title>register</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>
       <div id="parallax-world-of-ugg">
            
          <section>
            <img id="png" src="img/logo.png" alt="">
              <nav>
                 <ul>
                      <li><a href="index.php" id="current">Home |</a></li>
                      <li><a href="login.php">Courses |</a></li>
                      <li><a href="booking.php">Booking|</a></li>
                      <li><a href="news.php">News |</a></li>
                      <li><a href="contact.php">Contact |</a></li>
                      <li><a href="ourpartners.php">Partner |</a></li>
                      <li><a href="register.php">Sign In</a></li>     
                </ul>
              </nav>
          </section>

          <section>
            <div class="parallax-four">
              <h2>Sign In Today</h2>
            </div>
          </section>

          <div id="container">
              
            <form class="form-inline"  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
              
               <img src="img/logo.png" style="margin-left: 120px; width: 140px;">
               <h3 style="text-align: center;">Sign Up</h3>
            
              <hr />

              <?php
                if ( isset($errMSG) ) {
              ?>

              <div class="alert">
                <?php echo $errMSG; ?>
              </div>

              <?php
              }
              ?>

             

              <input type="text" name="name" class="form-control col-lg-4 " placeholder="Enter Name" maxlength="50"/>
              <span class="text-danger"><?php echo $nameError; ?></span>

              <input type="email" name="email" class="form-control " placeholder="Enter Your Email" maxlength="40"/>
              <span class="text-danger"><?php echo $emailError; ?></span>

              <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
              <span class="text-danger"><?php echo $passError; ?></span>

             
            
                
                <input type="checkbox">
                <label class="check" for="checkbox">I agree to terms</label>
        

              <button type="submit" class="custom-btn btn-warning col-lg-8 center" name="btn-signup">Sign Up</button>

              <a href="login.php"><p> Sign in Here...</p></a>


             
            

             
            
            </form>  
  
          </div>
    
          <footer>
          <a class="fa fa-lg fa-github" href="https://github.com/hadasamanis99" style="text-decoration: none; color: grey;">Hadasa Geiger |</a>
          <a class=" fa fa-lg fa-github" href="https://github.com/ayseuluc"  style="text-decoration: none; color: grey;">Ayse Uluc |</a>
          <a class=" fa fa-lg fa-github" href="https://github.com/Qying23"  style="text-decoration: none; color: grey;">Ying Qi |</a>
          <a class=" fa fa-lg fa-github" href="https://github.com/giavanna"  style="text-decoration: none; color: grey;">Giava Ferrandina |</a>
          <a class=" fa fa-lg fa-github" href="https://github.com/mirautas"  style="text-decoration: none; color: grey;">Simona Mirauta |</a>
          <a class=" fa fa-lg fa-github" href="https://github.com/stepienm"  style="text-decoration: none; color: grey;">Manuela Stepien |</a>
      </footer>

  </body>
</html>
<?php ob_end_flush(); ?>