<?php
include_once 'db_connect.php';
$userid = $_GET['getID'];
$query = "SELECT * FROM user where id='" . $userid . "'";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result)) {
	$fname = $row['firstname'];
	$middlename = $row['middlename'];
	$lastname = $row['lastname'];
	$email = $row['email'];
	$mobile = $row['mobile'];
}

echo $fname;

?>
<html>

<head>
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body>

	<h3>UPDATE FORM</h3>
	<form name="myform" action="update.php?e_id=<?php echo $userid ?>" onsubmit="return validateform()" method="POST">
		<div class="main container">
			<div class="main_name">
				<!-- Emp No. : <input type = "number" name = "empid" value = ""> -->
				First Name : <input type="text" name="firstname" value="<?php echo $fname ?>">
				Middle Name : <input type="text" name="middlename" value="<?php echo $middlename ?>">
				Last Name : <input type="text" name="lastname" value="<?php echo $lastname ?>">
				Email : <input type="text" name="email" value="<?php echo $email ?>">
				Mobile: <input type="text" name="mobile" value="<?php echo $mobile ?>">
			</div>
			<br>
			<div class="main_place">
				State : <select id="state" name="state" value=" ">
					<option value="Punjab">Punjab</option>
					<option value="Uttar Pradesh">Uttar Pradesh</option>
					<option value="Haryana">Haryana</option>
					<option value="Gujarat">Gujarat</option>
				</select>
				City : <select id="city" name="city" value=" ">
					<option value="CityA">CityA</option>
					<option value="CityB">CityB</option>
					<option value="CityC">CityC</option>
					<option value="CityD">CityD</option>
				</select>
			</div>
			<br>
			<div class="main_dept">
				Department : <input type="text" name="department" value="">
				Designation : <input type="text" name="designation" value="">
			</div>
			<br>
			<input type="submit" name="update" value="UPDATE">

		</div>

	</form>
</body>

</html>
<script src="validateform.js"></script>