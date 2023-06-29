<?php

include_once 'db_connect.php';

if (isset($_GET['delID'])) {
    $userid = $_GET['delID'];
    $sql = " delete user FROM user inner join employee on user.id='".$userid."';";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // echo "successfully deleted row with id - ".$userid;
        header("location:display.php");
        exit;
    }
}
?>
<!-- <br>
<a href = "display.php"><button type="button">DISPLAY PAGE</button></a> -->