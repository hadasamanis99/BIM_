<?php

	require_once 'db_connect.php';

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

            <section>
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


<?php


	if($_POST) {

	    $id = $_POST['id'];
	    $sql = "DELETE FROM admin WHERE userId = {$id}";

	    if($conn->query($sql) === TRUE) {
	        echo '<p style="color: black;margin-top:30px; margin-left: 30%; font-size: 25pt;">Account deleted</p>';
	        echo "<a href='../home.php'><button type='button'  style='margin-left: 30%' class='custom-btn '>Back to users</button></a>";
	    } else {
	        echo "Error updating record : " . $conn->error;

	    }

	    $conn->close();
	}

?>

    </footer>


</body>

</html>
