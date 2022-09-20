<?php
//include auth_session.php file on all user panel pages
//include("auth_session.php");
?>

<?php
// import credentials from the database
require_once("config.php");
// store the values from the form 
$emplogin_id =$_SESSION["employee"];
$firstname = $_REQUEST['name'];
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
$query= "UPDATE employee SET name ='$firstname' ,surname = '$lastname',employee_number= '$emp_id' ,
password = '$password',birthdate= '$birthdate' ,position = '$position',linemanager ='$linemanager' ,image='$Picture' ";


$result= mysqli_query ($conn, $query) or die("Was unable to update record");
//close connection 
mysqli_close($conn);
// display message to confirm that data has been inserted 
echo "<p style=\"color:green;\"> The record was successfully updated</p>";
?>