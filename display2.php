<html>

<head>

</head>

<body>
    <?php include_once 'db_connect.php';


        $sql3 = "select * from user";
        $result = mysqli_query($conn, $sql3);
        //mysqli_close($conn);

        //print_r($result);die;

        

while($row = mysqli_fetch_array($result)){

//echo $row['id'];
?>

<tr>
                <td><?php echo $row['id'];?></td>
            </tr>



<?php

}




  ?>
