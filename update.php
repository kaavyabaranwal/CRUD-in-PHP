<?php

include_once('db_connect.php');
if (isset($_POST['update'])) {

    $userid = $_GET['e_id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $salary = $_POST['salary'];

    $sql = " update user set firstname = '" . $firstname . "',middlename = '" . $middlename . "', lastname = '" . $lastname . "', email = '" . $email . "', mobile = '" . $mobile . "', updated_at =  NOW()  where id = '" . $userid . "';";

    $sql2 = " update employee set state = '" . $state . "',city = '" . $city . "', department = '" . $department . "', designation = '" . $designation . "', updated_at = NOW() where ref_id = '" . $userid . "';";

    $sql3 = "update salary set salary = '" . $salary. "';";

    // $date = "update user set updated_at =  NOW() where id = '".$userid."';";

    // $result = mysqli_query($conn, $sql);
    // $date_update = mysqli_query($conn, $date);
    // if($date_update){
    //     echo "updated_at";
    // }
    // else {
    //     echo "error";
    // }
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)) {
        header("location:display.php");
        exit;
    } else {
        echo "error";
    }
}
?>
<!-- <br>
<a href = "display.php"><button type="button">DISPLAY PAGE</button></a> -->