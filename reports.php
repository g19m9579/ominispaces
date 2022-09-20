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
    <div id="page-container" class='container'>

        
            <!-- all other page content -->

            <h2>Search Employees</h2>
            <form action = "reports.php" method="POST">
            <i class="fa fa-search"></i>
            <input type ="search" name="txtSearch" placeholder="am">
            <input type="submit" name="submit" value="Go">
            </form>
          
            <?php
            if (isset($_REQUEST['submit'])){
            // add database credentials
            require_once("config.php");
            //get value from form
            $search =$_REQUEST['txtSearch'];
            // make connection to DB
            $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db)
            or die("ERROR: unable to connect to database!");
            // issue query instructions
            $query = "SELECT employee_number, firstname, surname FROM employee
            WHERE firstname LIKE '%$search%' ORDER BY firstname ASC";
            $result = mysqli_query($conn, $query)
            or die("<p style=\"color: red;\">Could not execute query!</p>");
            //create headings
            echo "<ul>";
            while($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "<a href=\"settings.php?id=". $row['employee_number']. "\">". $row['firstname']." ". $row['surname'] ."</a>";
            echo "</li>";
            }
            echo "</ul>";
        

            // close database connection
            mysqli_close($conn);
            }
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