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

$query2 = "SELECT * FROM employee where ref_id='" . $userid . "'";
$result2 = mysqli_query($conn, $query2);

while ($row = mysqli_fetch_array($result2)) {
    $state = $row['state'];
    $city = $row['city'];
    $department = $row['department'];
    $designation = $row['designation'];
}


$query3 = "SELECT * FROM salary where ref_id='" . $userid . "'";
$result3 = mysqli_query($conn, $query3);

while ($row = mysqli_fetch_array($result3)) {
    $salary = $row['salary'];
}

$sql4 = 'select * from city;';
$query4 = mysqli_query($conn, $sql4);

$sql5 = 'select * from state;';
$query5 = mysqli_query($conn, $sql5);



// echo $fname;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light vh-100 d-flex align-items-center justify-content-center flex-column">
    <h3>UPDATE FORM</h3>
    <!-- <onsubmit="return validateform()" -->
    <form name="myform" action="update.php?e_id=<?php echo $userid ?>" method="POST" class="was-validated bg-light mt-4 mb-4 ">
        <div class="main container">
            <div class="main_name row">
                <!-- Emp No. : <input type = "number" name = "empid" value = ""> -->
                <div class="col">
                    <label for="firstname" class="form-label">First Name : </label><input type="text" name="firstname" value="<?php echo $fname ?>" class="form-control" required>
                </div>
                <div class="col">
                    <label for="middlename" class="form-label">Middle Name : </label><input type="text" name="middlename" value="<?php echo $middlename ?>" class="form-control" required>
                </div>
                <div class="col">
                    <label for="lastname" class="form-label">Last Name : </label><input type="text" name="lastname" value="<?php echo $lastname ?>" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col form-group">
                    <label for="email" class="form-label">Email : </label> <input type="email" name="email" value="<?php echo $email ?>" class="form-control " required>
                    <div class="invalid-feedback">Please enter correct e-mail.</div>
                </div>
                <div class="col">
                    <label for="mobile" class="form-label">Mobile : </label><input type="text" maxlength="10" minlength="10" name="mobile" value="<?php echo $mobile ?>" class="form-control" required>
                </div>
            </div>
            <div class="main_place row">
            <div class="col">
					<label class="form-label">State : </label><select id="state" name="state" value="" class="form-select" required>
						<option value=""></option>
						<?php while ($state_arr= mysqli_fetch_array($query5)) { ?>
							<option value="<?php echo $state_arr["state_name"]; ?>" <?php if($state_arr["state_name"] == $state){ print "selected='selected'"; } ?>>
								<?php echo $state_arr["state_name"]; ?>
							</option>
						<?php } ?>
					</select>
				</div>
				<div class="col">
					<label class="form-label">City : </label>
					<select id="city" name="city" value=" " class="form-select" required>
						<option value=""></option>
						<?php while ($city_arr = mysqli_fetch_array($query4)) { ?>
							<option value="<?php echo $city_arr["city_name"]; ?>" <?php if($city_arr["city_name"] == $city){ print "selected='selected'"; } ?>>
								<?php echo $city_arr["city_name"]; ?>
							</option>
						<?php } ?>
					</select>
				</div>
            </div>
            <br>
            <div class="main_dept row">
                <div class="col">
                    <label for="department" class="form-label">Department : </label> <input type="text" name="department" value="<?php echo $department; ?>" class="form-control" required>
                </div>
                <div class="col">
                    <label for="designation" class="form-label">Designation : </label> <input type="text" name="designation" value="<?php echo $designation ?>" class="form-control" required>
                </div>
                <div class="col">
                    <label for="salary" class="form-label">Current Salary : </label> <input type="number" name="salary" value="<?php echo $salary ?>" class="form-control" required>
                </div>
            </div>

            <div class="form-check mb-3 mt-3 ">
                <input class="form-check-input " type="checkbox" required>
                <label for="check" class="form-check-label">I confirm to update my details.</label>
                <!-- <div class="valid-feedback">Valid.</div> -->
                <div class="invalid-feedback">Check this checkbox to continue.</div>
            </div>
            <input type="submit" name="update" value="UPDATE" class="btn btn-primary">
        </div>

        </div>

    </form>
</body>

</html>
<!-- <script src="validateform.js"></script> -->