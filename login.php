<?php

  ob_start();
  session_start();

  require_once 'actions/db_connect.php';



  // it will never let you open index(login) page if session is set
  if ( isset($_SESSION['users'])!="" ) {
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

  if( isset($_POST['btn-login']) ) {

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
      $password = hash('sha256', $pass); // password hashing using SHA256

      $res=mysqli_query($conn, "SELECT userId, userName, userPass FROM admin WHERE userEmail='$email'");

      $row=mysqli_fetch_array($res, MYSQLI_ASSOC);

      $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
      if( $count == 1 && $row['userPass']==$password ) {

     $_SESSION['users'] = $row['userId'];
     header("Location: home.php");

     } 
      
}
      else {

        $errMSG = "Incorrect Credentials, Try again...";

      }

    }

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
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
                        <li><a href="register.php">Register Now or Sign In</a></li>


                    
                  </ul>
                </nav>
            </section>
<section>
  <div class="parallax-three">
    <h2>BIM EDUCATION AND TRAINING</h2>
  </div>
</section>

        <div id="container">
        <form class="form-inline" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">


          <?php
            if ( isset($errMSG) ) {
              echo $errMSG; ?>

            <?php
            }

          ?>
          <img src="img/logo.png" style="margin-left: 120px; width: 140px;">
          <h1 style="text-align: center;">Welcome Back</h1>
          <label for="email">Username:</label>
           <input type="email" name="email" class="form-control" placeholder="email" value="<?php echo $email; ?>" maxlength="40" />

          <span class="text-danger"><?php echo $emailError; ?></span>

          <label for="password">Password:</label>
          <input type="password" name="pass" class="form-control" placeholder="password" maxlength="15" value="<?php echo $pass; ?>"/>

          <span class="text-danger"><?php echo $passError; ?></span>

          <a href="register.php" class="custom-btn">New Account</a>

          <button type="submit" name="btn-login" class="custom-btn btn-1">Login</button>
        </div>
      </form>
    </div>
  </div>
</div> 
    </header><!-- /header -->
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