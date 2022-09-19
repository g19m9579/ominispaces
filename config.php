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
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>
