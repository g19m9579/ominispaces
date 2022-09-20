
<?php
//include auth_session.php file on all user panel pages
//include("auth_session.php");
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
          padding: 100px ;
}">
        <h1>Edit Profile</h1>
        <?php echo "<form action=\"userupdate.php?id=" . $_GET['id'] . "\" method=\"POST\">"; ?>
                      <div class="grid--50-50">
                            <label for="username"> First Name</label>
                            <input type="text" name="firstname" required>
                            </div>


                            <div class="grid--50-50">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" required>
                            </div>
                           
                            <div class="grid--50-50">
                            <label for="emp_id">EmployeeNumber</label>
                            <input type="text" name="emp_id" required>
                            </div>
                            
                            <div class="grid--50-50">
                            <label for="bdate">birthdate</label>  
                            <input type="date" name="bdate" required>
                            </div>
                         
                            <div class="grid--50-50">
                            <label for="position">position</label>
                            <input type="text" name="position" required>
                            </div>
                        
                            <div class="grid--50-50">
                            <label for="linemanager">linemanager</label>
                            <input type="text" name="linemanager" required>
                            </div>
                       

                            <div class="grid--50-50">
                            <label for="fileToUpload">  Select image to upload:</label>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            </div>
                        
                            <div class="grid--50-50">
                            <label for="password">Password</label>
                            <input type="password" name="password" min="6" max="10" required>
                            </div>

                            <div class="grid--50-50">
                            <label for="confirmpassword">Confirm Password</label>
                            <input type="password" name="confirmpassword">
                            </div>
                          <input type="submit" name="submit" value="Update Record">
              </form>
        </div>
    
        
                
          </div>
        </div>
    </div>

      <?php
      //store emplyeeNumber from previous page
      $id = $_REQUEST['id'];
      if (isset($_REQUEST['submit'])){
      //echo $id;
      // import credentials from the database
      require_once("config.php");
      // store the values from the form 
      //$emplogin_id =$_SESSION["employee"];
      $firstname = $_REQUEST['firstname'];
      $lastname = $_REQUEST['surname'];
      $emp_id = $_REQUEST['emp_id'];
      $birthdate = $_REQUEST['bdate'];
      $linemanager = $_REQUEST['linemanager'];

      $Picture = time().$_FILES['image']['name'];
      //Move image destination//
      $dest = "images/" . $Picture;
      move_uploaded_file($_FILES['image']['tmp_name'], $dest);

      $position = $_REQUEST['position'];
      $password = $_REQUEST['password'];

      //make a connecetion to the database 
      $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db)
      or die("ERROR: unable to connect to database!");
                  
      // issue query instructions 
      $query= "UPDATE employee SET firstname ='$firstname' ,surname = '$lastname',employee_number= '$emp_id' ,
      password = '$password',birthdate= '$birthdate' ,position = '$position',linemanager ='$linemanager' ,image='$Picture' WHERE employee_number= $id";


      $result= mysqli_query ($conn, $query) or die("Was unable to update record");
      //close connection 
      mysqli_close($conn);
      // display message to confirm that data has been inserted 
      echo "<p style=\"color:green;\"> The record was successfully updated</p>";
    }
      ?>
   
    
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
