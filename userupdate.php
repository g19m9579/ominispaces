
<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>

<?php
// import credentials from the database
require_once("config.php");

$user_id =$_SESSION['trader'];
//make a connecetion to the database 
$conn = mysqli_connect (SERVERNAME, USERNAME, PASSWORD, DATABASE)
or die("<p style=\"color: red;\">Could not connect to database!</p>");  
// issue the query 
$query= "SELECT firstName, lastName, emailAddress, userPass FROM trader Where  Trader_id='$user_id';";
$result= mysqli_query ($conn, $query) or die("Was unable to update details");
// store the trader details 
while($row=mysqli_fetch_array($result)){
$firstname= $row['firstName'];
$lastname= $row['lastName'];
$email=$row['emailAddress'];
$password=$row['userPass'];
}
//close connection 
mysqli_close($conn);
// display message to confirm that data has been inserted 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alluvial</title>
    <link rel="shortcut icon" type="image/jpg" href="images\favicon_io\favicon.ico"/>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">

  </head>

  <body>

       <!-- Static navbar -->
	    <!-- Static navbar -->
      <?php require  'partials/navigation.php'; ?>
  
	  <!-- +++++ Landing page Section +++++ -->
	<div id="page-container">
	  <div id="content-wrap">
    <div id="page-container" class='container'><div>
    <style>
    {
        box-sizing: border-box;
    }
    /* Set additional styling options for the columns*/
    .column {
    float: left;
    width: 50%;
    }

    .row:after {
    content: "";
    display: table;
    clear: both;
    }
    </style>
 </head>
 <body>
    <div class="row">
        <div class="column" style="background-color:#D7DBDD;  padding: 70px 0;
          padding-left: 150px ;
}">
        <h1>Edit Profile</h1>
          <form action="update.php" method= "POST"> enctype="multipart/form-data"  >    
                <label for="username"> First Name</label>
                <input type="text" name="firstname" required>

                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" required>

                <label for="emp_id">EmployeeNumber</label>
                <input type="text" name="emp_id" required>

                <label for="bdate">birthdate</label>
                <input type="date" name="bdate" required>

                <label for="position">position</label>
                <input type="text" name="position" required>

                <label for="linemanager">linemanager</label>
                <input type="text" name="linemanager" required>

                <label for="image">image</label>
                <input type="image" name="image" required>

                <label for="password">Password</label>
                <input type="password" name="password" min="6" max="10" required>

                <label for="confirmpassword">Confirm Password</label>
                <input type="password" name="confirmpassword">
              </form>
        </div>
        <div class="column" style="background-color:#D7DBDD;  height: 438px  padding: 70px 0;
          border: 3px solid #17202A ;};">
    
        <?php
    //store employee Number from previous page
      $emp_ID = $user_id;
      // add database credentials
      require_once("config.php");
      // make connection to DB
      $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
              or die("<p style=\"color: red;\">Could not connect to database!</p>");
      // issue query instructions
      $query = "SELECT * FROM employee Where employee_number = '$emp_ID';";
      $result = mysqli_query($conn, $query)
              or die("<p style=\"color: red;\">Could not execute query!</p>");
    //create headings
    echo "<fieldset class=\"scheduler-border\">";
    echo "<table>";
  // show employee details
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><h4>"."Employee Number: ".$row['employee_number']."</h4></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><h4>"."Name: ".$row['name']." ".$row['surname']."</h4></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><h4>"."Position: ".$row['position']."</h4></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><h4>"."Line Manager: ". $row['linemanager']."</h4></td>"; 
        echo "</tr>";
      }
      echo "</table>";   
   
      // close database connection
      mysqli_close($conn);
      ?>                 
    </div>

          
        </div>
    </div>


       
          
   
	
    
	  <!-- +++++ Footer Section +++++ -->
  
 <!-- Static navbar -->
 <footer class="footer navbar-fixed-bottom" style=" background:#232368">
				<div class=" container">
					<div class="row">
						<p>
						<p></p>
						</p>
					</div><!-- /col-lg-4 -->
				</div>
                    

   
  </body>
</html>
