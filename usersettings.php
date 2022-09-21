<!DOCTYPE html>
<?php
//include auth_session.php file on all user panel pages
//include("auth_session.php");
?>

<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<title> OMNI </title>
<link rel="shortcut icon" type="image/jpg" href="images\favicon_io\favicon.ico"/>

<!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="assets/css/main.css" rel="stylesheet">
</head>
<body>

<!-- Static navbar -->
<?php include  'partials/navigation.php'; ?>

<!-- +++++ Main Section +++++ -->
<div id="page-container" class='container' >

        <legend><strong>Your Settings</strong></legend><br>
        <?php
        $emply_id = $_REQUEST['id'];
        // add database credentials
        require_once("config.php");
        // make connection to DB
        $conn = new mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db)
        or die("<p style=\"color: red;\">Could not connect to database!</p>");
        // issue query instructions
        $query = "SELECT employee_number,surname, firstname FROM employee WHERE employee_number = $emply_id";
        $result = mysqli_query($conn, $query)
        or die("<p style=\"color: red;\">Could not execute query!</p>");
        //create headings
        echo"<table style =\"width: 75%;\">
        <tr style=\"background-color: #abd1d8;\">
        <td>Name </td>
        <td> --- </td>
        <td> --- </td>
        <td> --- </td>
        </tr>";
        while ($row = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>".$row['firstname']." ".$row['surname']."</td>";
        echo "<td>". "<a href=\"details.php?id=". $row['employee_number']. "\"> details</a>" ."</td>";
        echo "<td>". "<a href=\"userupdate.php?id=". $row['employee_number']. "\">Update</a>" ."</td>";
        echo "<td>" . "<a href=\"delete.php?id=" . $row['employee_number'] . "\"onClick=\"return confirm('Are you sure you want to delete?')\">delete</a>" . "</td>";
        echo "</tr>";
        echo "</tr>";
        }
        echo "</table>";
        // close database connection
        mysqli_close($conn);

        ?>
</div>

<!-- +++++ Footer Section +++++ -->
<footer id="footer">
    <div class="container">
        <div class="row">
            <p>
            <p></p>

            </p>
        </div><!-- /col-lg-4 -->
    </div>
    </div>
</footer>
</div>

</body>
</html>






