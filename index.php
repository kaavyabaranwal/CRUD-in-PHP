<?php
include_once 'db_connect.php';
$sql = 'select * from city;';
$query = mysqli_query($conn, $sql);

$sql2 = 'select * from state;';
$query2 = mysqli_query($conn, $sql2);

?>



<!DOCTYPE html>
<html lang="en">

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light vh-100 d-flex align-items-center justify-content-center flex-column">
	<!-- <onsubmit="return validateform()" -->
	<h3>REGISTRATION FORM</h3>
	<form name="myform" action="insert.php" method="POST" class="was-validated bg-light mt-4 mb-4 ">
		<div class="main container">
			<div class="main_name row">
				<!-- Emp No. : <input type = "number" name = "empid" value = ""> -->
				<div class="col">
					<label for="firstname" class="form-label">First Name : </label><input type="text" name="firstname" value="" class="form-control" required>
				</div>
				<div class="col">
					<label for="middlename" class="form-label">Middle Name : </label><input type="text" name="middlename" value="" class="form-control" required>
				</div>
				<div class="col">
					<label for="lastname" class="form-label">Last Name : </label><input type="text" name="lastname" value="" class="form-control" required>
				</div>
			</div>
			<div class="row">
				<div class="col form-group">
					<label for="email" class="form-label">Email : </label> <input type="email" name="email" value="" class="form-control " required>
					<div class="invalid-feedback">Please enter correct e-mail.</div>
				</div>
				<div class="col">
					<label for="mobile" class="form-label">Mobile : </label><input type="text" maxlength="10" minlength="10" name="mobile" value="" class="form-control" required>
				</div>
			</div>
			<div class="main_place row">
				<div class="col">
					<label class="form-label">State : </label><select id="state" name="state" value="" class="form-select" required>
						<option value=""></option>
						<?php while ($state= mysqli_fetch_array($query2)) { ?>
							<option value="<?php echo $state["state_name"]; ?>">
								<?php echo $state["state_name"]; ?>
							</option>
						<?php } ?>
					</select>
				</div>
				<div class="col">
					<label class="form-label">City : </label>
					<select id="city" name="city" value=" " class="form-select" required>
						<option value=""></option>
						<?php while ($city = mysqli_fetch_array($query)) { ?>
							<option value="<?php echo $city["city_name"]; ?>">
								<?php echo $city["city_name"]; ?>
							</option>
						<?php } ?>
					</select>
				</div>
			</div>
			<br>
			<div class="main_dept row">
				<div class="col">
					<label for="department" class="form-label">Department : </label> <input type="text" name="department" value="" class="form-control" required>
				</div>
				<div class="col">
					<label for="designation" class="form-label">Designation : </label> <input type="text" name="designation" value="" class="form-control" required>
				</div>
				<div class="col">
					<label for="salary" class="form-label">Current Salary : </label> <input type="number" name="salary" value="" class="form-control" required>
				</div>
			</div>

			<div class="form-check mb-3 mt-3 ">
				<input class="form-check-input " type="checkbox" required>
				<label for="check" class="form-check-label">I agree that the above information is correct.</label>
				<!-- <div class="valid-feedback">Valid.</div> -->
				<div class="invalid-feedback">Check this checkbox to continue.</div>
			</div>
			<input type="submit" name="Submit" value="Submit" class="btn btn-primary">
		</div>

		</div>

	</form>
</body>

</html>
<!-- <script src="validateform.js"></script> -->