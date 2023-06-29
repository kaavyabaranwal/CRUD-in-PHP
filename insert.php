<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $firstname = $_REQUEST['firstname'];
  $middlename = $_REQUEST['middlename'];
  $lastname = $_REQUEST['lastname'];
  $email = $_REQUEST['email'];
  $mobile = $_REQUEST['mobile'];
  $state = $_REQUEST['state'];
  $city = $_REQUEST['city'];
  $department = $_REQUEST['department'];
  $designation = $_REQUEST['designation'];
  $salary = $_REQUEST['salary'];
}
$sql  = "INSERT INTO user (firstname,middlename,lastname,email,mobile) values ('$firstname','$middlename','$lastname','$email','$mobile');";
// $nest = "SELECT id from user where firstname = '".$firstname."';";
if (mysqli_query($conn, $sql)) {
  $inserted_id = mysqli_insert_id($conn);
  // echo $inserted_id;

}

// $inserted_id = mysqli_insert_id($conn);
// echo $inserted_id;


$sql2 = "INSERT INTO employee (ref_id, state,city,department, designation) values ('$inserted_id','$state','$city','$department','$designation');";

// $sql3 = "INSERT INTO salary (salary, ref_id) values ('$salary', '(SELECT id from user where firstname = ".$firstname.")');";

$sql3 = "INSERT INTO salary (salary, ref_id) values ('$salary','$inserted_id');";


if (mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)) {
  header("location:display.php");
  exit;
} else {
  echo "Error in employee" . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);


?>

<!-- 
<br>
<a href="display.php"><button type="button">DISPLAY PAGE</button></a> -->