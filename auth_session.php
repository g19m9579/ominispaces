<?php
    session_start();
    if(!isset($_SESSION["loggeduser"])) {
        header("Location: login.php");
        exit();
    }
?> 