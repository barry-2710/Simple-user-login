<?php
    //This is a simple code to check if logged in or not
    if(!isset($_SESSION["loggedin"])) {
        header("Location: index.php");
        exit();
    }
?>