<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        table {
            border: 3px solid black;
            border-collapse: collapse;

        }

        td {
            text-align: center;
        }
    </style>
</head>

<body class="container">
    <?php include_once 'db_connect.php';
    $sql4 = "SELECT count(*) as counts FROM user inner join employee on user.id=employee.ref_id  inner join salary where employee.ref_id = salary.ref_id;";
    $result2 = mysqli_query($conn, $sql4);
    $ans = mysqli_fetch_array($result2);
    $counts = $ans['counts'];


    $sql3 = "SELECT user.id, firstname, middlename,lastname,email, mobile, state, city, department, designation, salary, user.created_at, user.updated_at FROM user inner join employee on user.id=employee.ref_id  inner join salary where employee.ref_id = salary.ref_id;";
    $result = mysqli_query($conn, $sql3);
    mysqli_close($conn);

    echo "<h4 mt-3 mb-3>"."Employee count : ".$counts."</h4>";
    echo "<table class='table table-light table-hover table-responsive-md mt-3 mb-3'>";
    echo "<thead class='table-dark'>";
    echo "<tr>";
    echo "<td>" . "ID" . "</td>";
    echo "<td>" . "First Name" . "</td>";
    echo "<td>" . "Middle Name" . "</td>";
    echo "<td>" . "Last Name" . "</td>";
    echo "<td>" . "Email" . "</td>";
    echo "<td>" . "Mobile" . "</td>";
    echo "<td>" . "State" . "</td>";
    echo "<td>" . "City" . "</td>";
    echo "<td>" . "Department" . "</td>";
    echo "<td>" . "Designation" . "</td>";
    echo "<td>" . "Salary" . "</td>";
    echo "<td>" . "Date created" . "</td>";
    echo "<td>" . "Date updated" . "</td>";
    echo "<td>" . "Edit" . "</td>";
    echo "<td>" . "Delete" . "</td>";
    echo "</tr>";
    echo "</thead>";

    $i = 1;
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row["firstname"]; ?></td>
            <td><?php echo $row["middlename"]; ?></td>
            <td><?php echo $row["lastname"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["mobile"]; ?></td>
            <td><?php echo $row["state"]; ?></td>
            <td><?php echo $row["city"]; ?></td>
            <td><?php echo $row["department"]; ?></td>
            <td><?php echo $row["designation"]; ?></td>
            <td><?php echo $row["salary"]; ?></td>
            <td><?php echo $row["created_at"]; ?></td>
            <td><?php echo $row["updated_at"]; ?></td>

            <td><a href="edit2.php?getID=<?php echo $row['id'] ?>"><button type="button" name="update" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></button></a></td>
            <td><a href="delete.php?delID=<?php echo $row['id'] ?>"><button type="button" name="delete" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a></td>
        </tr>
    <?php
        $i++;
    } ?>
    </table>
    <br>
    <a href="index.php" class="d-grid"><button type="button" class="btn btn-primary mt-2 mb-4 btn-block vw-90">Insert New Data</button></a>


</body>

</html>