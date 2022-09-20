

<!DOCTYPE html>
<?php


//mysql://bc752cb2cd22f9:2b7fd4cd@us-cdbr-east-06.cleardb.net/heroku_2603e552e2050c5?reconnect=true

//UN:bc752cb2cd22f9
//PSD:2b7fd4cd
//Host:us-cdbr-east-06.cleardb.net

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("mysql://bc752cb2cd22f9:2b7fd4cd@us-cdbr-east-06.cleardb.net/heroku_2603e552e2050c5?reconnect=true"));
$cleardb_server = $cleardb_url["us-cdbr-east-06.cleardb.net"];
$cleardb_username = $cleardb_url["bc752cb2cd22f9"];
$cleardb_password = $cleardb_url["2b7fd4cd"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = new mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db)
or die("ERROR: unable to connect to database!");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 }
   echo "Connected successfully";

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>