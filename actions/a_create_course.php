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
                <img id="png" src="../img/logo.png" alt="">
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

		$cName = $_POST['cName'];
	    $cBegin = $_POST['cBegin'];
	    $cEnd = $_POST['cEnd'];
	    $cDetails = $_POST['cDetails'];
	    $cSchedule = $_POST['cSchedule'];
	    $cDescription = $_POST['cDescription'];
	    $cPrice = $_POST['cPrice'];
	    $capacity = $_POST['capacity'];
	    

	    $sql = "INSERT INTO cours (cName, cBegin, cEnd, cDetails, cSchedule, cDescription, cPrice, capacity) VALUES ('$cName', '$cBegin', '$cEnd', '$cDetails', '$cSchedule', ' $cDescription', '$cPrice', '$capacity')";

	    if($conn->query($sql) === TRUE) {
	        echo '<p style="color: black;margin-top:30px; margin-left: 30%; font-size: 25pt;">New Course Successfully Created</p>';
	        echo "<a href='../create_course.php'><button type='button' style='margin-left: 30%' class='custom-btn'>Back to creator</button></a>";
	        echo "<a href='../home.php'><button type='button'  class='custom-btn'>Back to courses</button></a>";
	    } else {
	        echo "Error " . $sql . ' ' . $conn->connect_error;
	    }
	    $conn->close();
	}

?>

</body>
</html>
