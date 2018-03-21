<?php 
	ob_start();
	session_start();
	require_once 'actions/db_connect.php'; 
	

	$res=mysqli_query($conn, "SELECT * FROM admin WHERE userId=".$_SESSION['users']);
//echo$_SESSION['users'];
	$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="css/h_style.css">
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





	<?php

	if	($userRow['users'] == 0) {
		?>
		<section>
		  <div class="parallax-five">
		    <h2>BIM EDUCATION AND TRAINING</h2>
		  </div>
		</section>

		<div class="block">
    		<h1><span class="first-character ny">C</span>ourse</h1>
    		<br>
    		<br>
    		<br>
		<div class="">
	
			    <table border="1" cellspacing="0" cellpadding="0">

			        <tbody>
			      		<?php

			              $sql = "SELECT cId, image, cName, cBegin, cEnd, cDetails, cSchedule, cDescription, cPrice, capacity FROM cours";
			              $result = $conn->query($sql);


			              if($result->num_rows > 0) {
			                  while($row = $result->fetch_assoc()) {
			                      echo "
  										  <div class='box_course'>
   											 <span class='icon-cont'><i class='fa fa-graduation-cap'></i></span>
			                            		<a href='view.php?id=".$row['cId']."'></a>
			                            		 <img class='' src='http://localhost/BIM/img/".$row['image']."'style='width:100%; height:120px;>
			                              		<div class='caption'>
				                                <p>".$row['cName']."</p>
				                                <p>".$row['cPrice']." € </p>
			                                <a href='update_course.php?id=".$row['cId']."'><button class='custom-btn btn-1' type='button'>Edit</button></a>
				                            <a href='delete_course.php?id=".$row['cId']."'><button class='custom-btn btn-1' type='button'>Delete</button></a> 
			                              </div>
			                              </div>
			                            </a>
			                          </div>
			                        </div>";
				                            }
				                        } 
			              	else {
			                  echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
			              		}
			            ?>
			        </tbody>
			    </table>
			    	<div class="buttons-coll">
			    	<a href='create_course.php'><button class="custom-btn btn-1" type='button'>Add Course</button></a>
			    </div>
			    	                              	
		  	</div>
		  </div>

   <div class="block">
    		<h1><span class="first-character atw">U</span>ser</h1>
    		<br>
    		<br>
    		<br>
		<div class="">
		    
			    <table border="1" cellspacing="0" cellpadding="0">
			        <tbody>

			      		<?php

			              $sql = "SELECT userId, userName, userEmail FROM admin";
			              $result = $conn->query($sql);


			              if($result->num_rows > 0) {
			                  while($row = $result->fetch_assoc()) {
			                      echo "
  										  <div class='box_course'>
   											<span class='icon-cont'><i class='fa fa-user'></i></span>
			                            <a href='view.php?id=".$row['userId']."'></a>
			                              <div class='caption'>
			                                <p>".$row['userName']."</p>
			                                <div class='buttons-coll'>
				                            <a href='delete_user.php?id=".$row['userId']."'><button class='custom-btn btn-1' type='button'>Delete User</button></a>
				                            </div>  
			                              </div>
			                            </a>
			                          </div>
			                        </div>";
				                            }
				                        } 
			              	else {
			                  echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
			              		}
			            ?>
			        </tbody>
			    </table>    	
		  	</div>
		  </div>
		  		 <div class="buttons-coll">
				<button class="custom-btn btn-1" id="sign-out">
					<a href="logout.php?logout">Sign Out</a>
				</button>
			</div>	

    <?php
	}
	
	else
		 {
		?>
		<div class="block">
    		<h1><span class="first-character ny">C</span>ourse</h1>
    		<br>
    		<br>
    		<br>
		<div class="">
	
			    <table border="1" cellspacing="0" cellpadding="0">
			        <tbody>
			      		<?php

			              $sql = "SELECT cId, image, cName, cBegin, cEnd, cDetails, cSchedule, cDescription, cPrice, capacity FROM cours";
			              $result = $conn->query($sql);


			              if($result->num_rows > 0) {
			                  while($row = $result->fetch_assoc()) {
			                      echo "
  										  <div class='box_course'>
   											 <span class='icon-cont'><i class='fa fa-graduation-cap'></i></span>
			                            		<a href='view.php?id=".$row['cId']."'></a>
			                            		 <img class='' src='http://localhost/BIM/img/".$row['image']."'style='width:100%; height:120px;>
			                              		<div class='caption'>
				                                <p>".$row['cName']."</p>
				                                <p>".$row['cPrice']." € </p>
				                                <a href='view.php?id=".$row['cId']." ' class='custom-btn btn-1' style='color:black;background-color:white;decoretion:none;'>Read More</a>
			                              </div>
			                              </div>
			                            </a>
			                          </div>
			                        </div>";
				                            }
				                        } 
			              	
			            ?>
			        </tbody>
			    </table>
			    	
			    	                              	
		  	</div>
		  </div>	                          
			          
			             <div class="buttons-coll">
				<button class="custom-btn btn-1" id="sign-out">
					<a href="logout.php?logout">Logout</a>
				</button>
			</div>	
			        </tbody>
			    </table>
 	
		  	</div>


    <?php
	}

	?>
				

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