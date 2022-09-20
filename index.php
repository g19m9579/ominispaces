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
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">
    
    <title> OMNI </title>
    <link rel="shortcut icon" type="images/jpg" href="images\favicon_io\favicon.ico"/>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">

</head>

<body>

    <!-- Static navbar -->

    <?php require  'partials/navigation.php'; ?>

    <!-- +++++ Landing page Section +++++ -->
    <div id="page-container">
        <div id="content-wrap">
    
              
            </div> <!-- /container -->
        </div>



        <!-- +++++ Footer Section +++++ -->
        <footer id="footer">
            <div class="container">
                <div class="row">

                    <p class='pt-3'>
                    <?php
   require_once("config.php");
   // make connection to database
   // Connect to DB
    $conn = new mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db)
    or die("ERROR: unable to connect to database!");

   $slquery = " SELECT * FROM employee WHERE employee_number = 619;";
   

   $result = $conn->query($slquery)
                   or die(" cannot run query.");



   while($row = $result->fetch_assoc()) {
    echo "id: " . $row["name"] ."<br>";
  }

    ?> 

                    </p>

                </div><!-- /col-lg-4 -->
            </div>
    </div>
    </footer>
    </div>
    </div>

   
</body>

</html>