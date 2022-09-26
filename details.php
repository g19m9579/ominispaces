<!DOCTYPE html>
<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
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
<div id="page-container" class='container' style=" align= center adding: 70px 0;
        padding-left: 120px;>

        
    <div id="content-wrap">
        <!-- all other page content -->

            <?php
            //store emplyeeNumber from previous page
            $emply_id = $_REQUEST['id'];
            // add database credentials
            require_once("config.php");
            // make connection to DB
            $conn = new mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db)
            or die("<p style=\"color: red;\">Could not connect to database!</p>");
            // issue query instructions
            $query = "SELECT * FROM employee WHERE employee_number = $emply_id";
            $result = mysqli_query($conn, $query)
            or die("<p style=\"color: red;\">Could not execute query!</p>");
            while($row = $result->fetch_assoc()) {
            echo "<br>"."</br>";
            echo "<img src='".$row['image']."' />";
            echo "<img src='images/".$row['image']."  ' />";
            //echo "<img src='images/".$row['image']." style="width:200px;height:200px;">"; 
            echo "<h2>" .$row['firstname']." ".$row['surname']. "</h2>";
            echo "<br>"."Job Title: ". $row['position'] . "<br>";
            echo "<br>"."Employee Number: ". $row['employee_number']."<br>";
            echo "<br>"."Reprts To: ". $row['line_manager']."<br>";
           
            }
            // close database connection
            mysqli_close($conn);
            echo "<br>"."</br>";
            echo "<a href=\"settings.php\">Back</a>";
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