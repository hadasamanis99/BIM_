<!DOCTYPE html>

<html>
    <head>
        <title>payment</title>
        <link rel="stylesheet" type="text/css" href="css/v_style.css">

<script>
function myFunction() {
    alert("You will get a Email about that course and the payment information!");
}
</script>

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

    <fieldset>

        <h1><span class="first-character atw">C</span>ourse</h1>
        <h1><span class="first-character atw">D</span>etails</h1>
        <form action="actions/a_booking.php" method="post">

            <table cellspacing="0" cellpadding="0">
                <tr>
                    <th>First Name</th>
                    <td><input type="text" name="fname" placeholder="First Name"/></td>
                </tr>     
                
                <tr>
                    <th>Last Name</th>
                    <td><input type="text" name="lName" placeholder="Last Name"/></td>
                </tr>

                <tr>
                    <th>Cours Name</th>
                    <td><input type="text" name="dcName" placeholder="Cours Name"/></td>
                </tr>

                <tr>
                    <th>Course Begin</th>
                    <td><input type="date" name="bBegin" placeholder="" /></td>
                </tr>
                
                <tr>
                    <th>Email</th>
                    <td><input type="text" name="bEmail" placeholder="Email"/></td>
                </tr>
    

                <tr>
                    <td><a href="home.php"><button class="custom-btn btn-1" type="button">Back to courses</button></a></td>
                
                    <td><a href="fin.php"><button  class="custom-btn btn-1"  onclick="myFunction()"> Proceed</button></td>
                    <div class='buttons-coll'>

                    </div>  


                 </tr>   

            </table>

        </form>

    </fieldset>
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

