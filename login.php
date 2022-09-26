<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> OMNI </title>
    <link rel="shortcut icon" type="image/jpg" href="images\favicon_io\favicon.ico"/>
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
                <h3>OMNI</h3>
                <h6>
                    Work place assurance
                </h6>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Previous</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>

    
    <?php
//set session 

// Instantiate a new client just like you would normally do. Using a prefix for
// keys will effectively prefix all session keys with the specified string.
$client = new Predis\Client($single_server, array('prefix' => 'sessions:'));

// Set `gc_maxlifetime` to specify a time-to-live of 5 seconds for session keys.
$handler = new Predis\Session\Handler($client, array('gc_maxlifetime' => 5));

// Register the session handler.
$handler->register();

// We just set a fixed session ID only for the sake of our example.
session_id('example_session_id');
session_start();

// if (isset($_SESSION['foo'])) {
//     echo "Session has `foo` set to {$_SESSION['foo']}", PHP_EOL;
// } else {
//     $_SESSION['foo'] = $value = mt_rand();
//     echo "Empty session, `foo` has been set with $value", PHP_EOL;
// }



//-------------------------------------------------------------------------------------

require_once("config.php");
// Connect to DB
$conn = new mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db)
or die("ERROR: unable to connect to database!");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 }
   echo "Connected successfully";

//Processing form data when form is submitted
if(isset($_REQUEST['submit'])){

    $emp_id = trim($_REQUEST['emp_id']);
    $password = trim($_REQUEST['password']);

    // issue query instructions
    $query = "SELECT *
    FROM employee
    WHERE employee_number = '$emp_id'
        AND  password = '$password';";

    $result = mysqli_query($conn, $query) or die("ERROR: unable to execute query!");
    
    if($result){
        $user;
        while ($row = mysqli_fetch_array($result)){
            $user = $row['name'];
            $passw = $row['password'];
            $user_id = $row['employee_number'];
        }
        if($emp_id==$user_id and $passw == $password ){
            $_SESSION["loggeduser"]= $user_id;
            header("location:homepage.php");
        }else	{
            $_SESSION['message']="Incorrect Username or Password,Try again.";
            header("location:login.php");
        }
        }

}
// close the connection to database
mysqli_close($conn);
?>

    <div id="page-container">
        <div id="content-wrap">
            <!-- all other page content -->

            +++++login+++++>
            <div class="login-root">
                <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
                    <div class="loginbackground box-background--white padding-top--64">
                        <div class="loginbackground-gridContainer">
                            <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
                                <div class="box-root"
                                    style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
                                </div>
                            </div>
                            <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
                                <div class="box-root box-divider--light-all-2 animationLeftRight tans3s"
                                    style="flex-grow: 1;"></div>
                            </div>
                            <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
                                <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
                            </div>
                            <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
                                <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;">
                                </div>
                            </div>
                            <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
                                <div class="box-root box-background--gray100 animationLeftRight tans3s"
                                    style="flex-grow: 1;"></div>
                            </div>
                            <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
                                <div class="box-root box-background--cyan200 animationRightLeft tans4s"
                                    style="flex-grow: 1;"></div>
                            </div>
                            <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
                                <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;">
                                </div>
                            </div>
                            <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
                                <div class="box-root box-background--gray100 animationRightLeft tans4s"
                                    style="flex-grow: 1;"></div>
                            </div>
                            <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
                                <div class="box-root box-divider--light-all-2 animationRightLeft tans3s"
                                    style="flex-grow: 1;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box-root padding-top--24 flex-flex flex-direction--column"
                        style="flex-grow: 1; z-index: 9;">
                        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
                            <h1>Log In</a></h1>
                        </div>
                        <div class="formbg-outer">
                            <div class="formbg">
                                <div class="formbg-inner padding-horizontal--48">
                                    <span class="padding-bottom--15">Sign in to your account</span>
                                    <form action="login.php" method="POST">
                                    <div class="field padding-bottom--24">
                                        <div class="grid--50-50">
                                            <label for="emp_id">EmployeeNumber</label>
                                        </div>
                                        <input type="text" name="emp_id" required>
                                        </div>
                                        
                                        <div class="field padding-bottom--24">
                                            <div class="grid--50-50">
                                                <label for="password">Password</label>
                                            </div>
                                            <input type="password" name="password" placeholder="Password" required>
                                        </div>
                                        <div class="text-center">Dont have an account? <a href="signup.php">Sign Up</a></div>
                                        <div class="field padding-bottom--24">
                                        <!-- <p id="temp">
                                                <?php
                                                if(isset($_SESSION["message"])){
                                                    $error = $_SESSION["message"];
                                                    echo "<span>$error</span>";
                                                }
                                                ?>  
                                                </p> -->
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
                    <a href="about.html">About Us</a><br />
                    </p>
                </div><!-- /col-lg-4 -->
            </div>
    </div>
    </footer>
    </div>
<script>
    let temp = document.getElementById("temp");
    setInterval(() => {
      temp.innerHTML = "";
    }, 3400);
  </script>

</body>

</html>