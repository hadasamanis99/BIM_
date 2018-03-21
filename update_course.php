<?php
require_once 'actions/db_connect.php';


if($_GET['id']) {
    $cid = $_GET['id'];
        
    $sql = "SELECT * FROM cours WHERE cId = {$cid}";

    $result = $conn->query($sql);

    $data = $result->fetch_assoc();

    $conn->close();
//echo$data['cId'];
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
                        <li><a href="register.php">Register Now or Sign In |</a></li>


                    
                  </ul>
                </nav>
            </section>

<section>
  <div class="parallax-three">
    <h2>BIM EDUCATION AND TRAINING</h2>
  </div>
</section>


                <form action="actions/a_update_course.php" method="post">
                    <table>
                        <tr>
                        <th class="thcreate">Image</th>
                        <td class="tdadd"><input type="text" name="image" placeholder="image" value="<?php echo $data['image'] ?>" /></td>
                        </tr> 
                        <tr>
                        <th class="thcreate">Name</th>
                        <td class="tdadd"><input type="text" name="cName" placeholder="cName" value="<?php echo $data['cName'] ?>" /></td>
                    </tr> 
                    <tr>
                        <th class="thcreate">Begin</th>
                        <td class="tdadd"><input type="text" name="cBegin" placeholder="cBegin" value="<?php echo $data['cBegin'] ?>" /></td>
                    </tr> 
                    <tr>
                        <th class="thcreate">End</th>
                        <td class="tdadd"><input type="text" name="cEnd" placeholder="cEnd" value="<?php echo $data['cEnd'] ?>" /></td>
                    </tr>
                    <tr>
                        <th class="thcreate">Details</th>
                        <td class="tdadd"><input type="text" name="cDetails" placeholder="cDetails" value="<?php echo $data['cDetails'] ?>" /></td>
                    </tr>
                    <tr>
                        <th class="thcreate">Schedule</th>
                        <td class="tdadd"><input type="text" name="cSchedule" placeholder="cSchedule" value="<?php echo $data['cSchedule'] ?>" /></td>
                    </tr>
                    <tr>
                        <th class="thcreate">Description</th>
                        <td class="tdadd"><input type="text" name="cDescription" placeholder="cDescription" value="<?php echo $data['cDescription'] ?>" /></td>
                    </tr>
                    <tr>
                        <th class="thcreate">Price</th>
                        <td class="tdadd"><input type="text" name="cPrice" placeholder="cPrice" value="<?php echo $data['cPrice'] ?>" /></td>
                    </tr>

                     <tr>
                        <th class="thcreate">Capacity</th>
                        <td class="tdadd"><input type="text" name="capacity" placeholder="capacity" value="<?php echo $data['capacity'] ?>" /></td>
                    </tr>
                        <tr>
                            <input type="hidden" name="id" value="<?php echo $data['cId']?>" />
                            <td class="tdadd"><button type="submit" class="custom-btn btn-1">Save Changes</button></td>
                            <td class="tdadd"><a href="home.php"><button type="button" class="custom-btn btn-1">Back</button></a></td>
                        </tr>
                    </table>
                </form>
            </fieldset>
                <div>
                      <!--<a href="login.php">Admin</a>-->
                      <footer class="fixed-bottom">
                        <p> &copy; </p>     
                      </footer>
                </div> 
        </div>
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