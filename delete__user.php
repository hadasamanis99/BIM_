<?php

require_once 'actions/db_connect.php';

if($_GET['id']) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM admin WHERE userId = {$id}";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();

    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Events</title>
    <link rel="stylesheet" type="text/css" href="style.css">


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

			<h3>Do you really want to delete this Event?</h3>

			<form action="actions/a_delete_user.php" method="post">
			    <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
			    <button type="submit">Yes, delete it!</button>
			    <a href="home.php"><button type="button">No, go back!</button></a>
			</form>
			 
		</div>
	  </div>
	  <div>
               <footer class="fixed-bottom" id="footerdelete">
                    <p> &copy; Giava Ferrandina - CodeFactory 2018</p>     
               </footer>
             </div> 

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

<?php
}
?>