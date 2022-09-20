<!DOCTYPE html>
<?php
      if (isset($_REQUEST['submit'])){
        
        require_once("config.php");
        // make connection to database
        $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db)
        or die("ERROR: unable to connect to database!");
          
   
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
        $cpassword = $_REQUEST['confirmpassword'];


        $slquery = "SELECT COUNT(*) as total FROM employee
                    WHERE EXISTS
                      (SELECT *
                      FROM employee
                      WHERE employee_number = '$emp_id');";
        

        $selectresult = mysqli_query($conn, $slquery)
                        or die(" cannot run query.");

        $data=mysqli_fetch_array($selectresult);

        if ($password != $cpassword ){
          echo " <script>
                  alert(\" password don't match retry\");
                </script>";
          die("passwords don't match");
        }
        if($data['total'] > 0){
          echo " <script>
                  alert(\" email already associated with account\");
                </script>";
          die("email exists");
          }
        
          // issue query instructions
        $query = "INSERT INTO employee(name,surname,employee_number,password,birthdate,position,line_manager,image)
        VALUE( '$firstname', '$lastname', '$emp_id','$password', '$birthdate','$position' , '$linemanager' , '$Picture')";

        $result = mysqli_query($conn, $query) or die("ERROR: unable to execute query!");
        // close the connection to database
        if($result){
          mysqli_close($conn);
          header('location: https://omnispaces.herokuapp.com/login.php');
          exit;
        }

      }
      
      
?>
<html lang="en">
<style>
  #message p{
    font: 80% sans-serif;
    margin: 0;
  }
  #message{
    margin-bottom: 5%;
  }
</style>
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
    <div class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
            <span class="icon-bar"></span>
            <h3 >OMNI</h3>
            <h6>
            Work place assurance
            </h6>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          <li><a href="landing.html">Home</a></li>
          <li><a href="login.php">LogIn</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


	
  <!-- +++++ login+++++ -->


  <div id="page-container">
    <div id="content-wrap">
      <!-- all other page content -->
      <div class="login-root">
        <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
          <div class="loginbackground box-background--white padding-top--64">
            <div class="loginbackground-gridContainer">
              <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
                <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
                </div>
              </div>
              <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
                <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
              </div>
              <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
                <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
              </div>
              <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
                <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
              </div>
              <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
                <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
              </div>
              <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
                <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
              </div>
              <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
                <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
              </div>
              <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
                <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
              </div>
              <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
                <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
              </div>
            </div>
          </div>
          <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
            <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
              <h1>Sign up</h1>
            </div>
            <div class="formbg-outer">
              <div class="formbg">
                <div class="formbg-inner padding-horizontal--48">
                  <span class="padding-bottom--15">Set up your new account</span>

                  <form action="signup.php" method="post" enctype="multipart/form-data"  >
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
                            <label for="image">image</label>
                            <input type="image" name="image" required>
                            </div>
                        
                            <div class="grid--50-50">
                            <label for="password">Password</label>
                            <input type="password" name="password" min="6" max="10" required>
                            </div>

                            <div class="grid--50-50">
                            <label for="confirmpassword">Confirm Password</label>
                            <input type="password" name="confirmpassword">
                            </div>
                   
                         

                            <div id="message">
                              <h5>Password must contain the following:</h5>
                              <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                              <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                              <p id="number" class="invalid">A <b>number</b></p>
                              <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                            </div>
                            
                            <div class="field padding-bottom--24">
                              <input type="submit" name="submit" value="Continue">
                            </div>

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    

      <!-- +++++ Footer Section +++++ -->
    <footer id="footer">
      <div class="container">
        <div class="row">
            <p>
             <p></p>
              <a href="about.html">About Us</a>
            </p>
          </div><!-- /col-lg-4 -->
    </footer>

<script>
  var myInput = document.getElementById("password");
  var letter = document.getElementById("letter");
  var capital = document.getElementById("capital");
  var number = document.getElementById("number");
  var length = document.getElementById("length");

  // When the user clicks on the password field, show the message box
  myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
  }

  // When the user clicks outside of the password field, hide the message box
  myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
  }

  // When the user starts to type something inside the password field
  myInput.onkeyup = function() {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if(myInput.value.match(lowerCaseLetters)) {  
      letter.classList.remove("invalid");
      letter.classList.add("valid");
    } else {
      letter.classList.remove("valid");
      letter.classList.add("invalid");
    }
    
    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if(myInput.value.match(upperCaseLetters)) {  
      capital.classList.remove("invalid");
      capital.classList.add("valid");
    } else {
      capital.classList.remove("valid");
      capital.classList.add("invalid");
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if(myInput.value.match(numbers)) {  
      number.classList.remove("invalid");
      number.classList.add("valid");
    } else {
      number.classList.remove("valid");
      number.classList.add("invalid");
    }
    
    // Validate length
    if(myInput.value.length >= 8) {
      length.classList.remove("invalid");
      length.classList.add("valid");
    } else {
      length.classList.remove("valid");
      length.classList.add("invalid");
    }
  }
</script>
  </body>
</html>