<?php
require_once 'actions/db_connect.php';

if($_GET['id']) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM cours WHERE cId = {$id}";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    $conn->close();
?>


<!DOCTYPE html>
<html>
    <head>

        <title>View Event</title>
        <link rel="stylesheet" type="text/css" href="css/v_style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>

           
            .scart{
                background-color:#19c3cc;
                width: 170px;
                height: 150px;
            }
            .cart_details {
                width: 109px;
                float: left;
                padding: 15px 0 0 15px;
                text-align: left;
            }
            .cart_details {
                width: 109px;
                float: left;
                padding: 5px 0 0 15px;
                text-align: left;
            }
            .cart_icon {
                float: left;
                padding: 5px 0 0 5px;
            }

            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 50%;
            }

            table tr th {
                padding-top: 20px;
            }

            table {
              font-family:Source Sans Pro, sans-serif;
              border-collapse: collapse;
              width: 100%;
            }

            table tr{
                background-color: white;
            }

             td, th {
                border: 1px solid white;
                text-align: left;
                padding: 8px;
                width: 20%;
                   
              }
              th{
                color: grey;
                font-family: Oswals, sans-serif;
              }
            button{
                font-size: 20px;
                border-radius: 5px;
                
            }


        </style>
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


<!-- ********** booking  ********** -->


        <fieldset>

                    <h1><span class="first-character atw">C</span>ourse</h1>
                    <h1><span class="first-character atw">D</span>etails</h1>

            <form action="actions/a_create.php" method="post">

                <table cellspacing="0" cellpadding="0">
                    <img src='http://localhost/BIM/img/<?php echo $data['image'] ?>' style='width:100%;height:250px;'>
                    <tr>
                        <th>Name</th>
                        <td><?php echo $data['cName'] ?></td>
                    </tr> 
                    <tr>
                        <th>Course Begin</th>
                        <td><?php echo $data['cBegin'] ?></td>
                    </tr>     
                    <tr>
                        <th>Course End</th>
                        <td><?php echo $data['cEnd'] ?></td>
                    </tr>
                    <tr>
                        <th>Capacity</th>
                        <td><?php echo $data['capacity'] ?> Person </td>
                    </tr>
                    <tr>
                        <th>Cost</th>
                        <td><?php echo $data['cPrice'] ?> €</td>
                    </tr>
                     <tr>
                        <th>Description</th>
                        <td> <?php echo $data['cDescription'] ?></td>

                    </tr>
                     
                    
                    <div class='buttons-coll'>
                    <tr>
    
                        <th><a href="index.php"><button class="custom-btn btn-1" type="button">Back</button></a></th>
                        <td><a href="booking.php"><button class="custom-btn btn-1" type="button">Booking</button></a></td>
                    </tr>
                    </div>  





                </table>

            </form>
        </fieldset>


  
    </body>
            <footer>
        <a class="fa fa-lg fa-github" href="https://github.com/hadasamanis99" style="text-decoration: none; color: grey;">Hadasa Geiger |</a>
        <a class=" fa fa-lg fa-github" href="https://github.com/ayseuluc"  style="text-decoration: none; color: grey;">Ayse Uluc |</a>
        <a class=" fa fa-lg fa-github" href="https://github.com/Qying23"  style="text-decoration: none; color: grey;">Ying Qi |</a>
        <a class=" fa fa-lg fa-github" href="https://github.com/giavanna"  style="text-decoration: none; color: grey;">Giava Ferrandina |</a>
        <a class=" fa fa-lg fa-github" href="https://github.com/mirautas"  style="text-decoration: none; color: grey;">Simona Mirauta |</a>
        <a class=" fa fa-lg fa-github" href="https://github.com/stepienm"  style="text-decoration: none; color: grey;">Manuela Stepien |</a>
    </footer>

</html>

<?php
}
?>