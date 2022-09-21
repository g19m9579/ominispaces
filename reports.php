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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {packages:["orgchart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('string', 'Manager');
        data.addColumn('string', 'ToolTip');


        //get database info for chart
        <?php 
            // add database credentials
            require_once("config.php");
        // make connection to DB
        $conn = new mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db)
        or die("<p style=\"color: red;\">Could not connect to database!</p>");
        // issue query instructions
        $query = "SELECT * FROM employee";
        $result = mysqli_query($conn, $query)
        or die("<p style=\"color: red;\">Could not execute query!</p>");

        // For each orgchart box, provide the name, manager, and tooltip to show.
       echo "data.addRows([";
       while($row = $result->fetch_assoc()) {
        if($row['line_manager']){
            echo "[{'v':".$row['firstname'].", 'f':' ".$row['line_manager']." <div style='color:red; font-style:italic'> ".$row['position']." </div>'}]";
        }else{
            echo "[".$row['firstname'].", ".$row['line_manager']." ,".$row['position']."]";
        }
       }
        echo "]);";
        ?>
        // Create the chart.
        var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
        // Draw the chart, setting the allowHtml option to true for the tooltips.
        chart.draw(data, {'allowHtml':true});
      }
   </script>


</head>

<body>

    <!-- Static navbar -->
    <?php include  'partials/navigation.php'; ?>

    <!-- +++++ Main Section +++++ -->
    <div id="page-container" class='container'>

    <div id="chart_div"></div>

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