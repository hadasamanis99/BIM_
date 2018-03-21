<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/addStyle.css">



</head>
<body>

<?php

require_once 'db_connect.php';

if($_POST) {
    $fname = $_POST['fname'];
    $lName = $_POST['lName'];
    $bBegin = $_POST['bBegin'];
    $bEmail = $_POST['bEmail'];
    $cId = $_POST['dcName'];



    $sql = "INSERT INTO booking (fname, lName, bBegin, bEmail, dcName ) VALUES ('$fname', '$lName', '$bBegin','$bEmail','$cId')";

    if($conn->query($sql) === TRUE) {
        echo "<div>
        <center> <img style='width:70%' src='https://i0.wp.com/www.scoutingforbeer.org.uk/wp-content/uploads/2016/04/thank-you-1400x800-c-default.gif'></center>
    </div>";
       
        echo "<a href='../home.php'><button style='width:20%; height:20%; background: #E6EEF4; margin-left: 40%;' type='button'>Back to courses</button></a>";
    } else {
        echo "Error " . $sql . ' ' . $conn->conn_error;
    }

    $conn->close();
}

?>



</body>
</html>