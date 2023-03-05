<?php
session_start();

if(!isset($_SESSION['authentificated']))
{
    $_SESSION['status'] = "Please login to access user Dashboard.";
    header('Location: login.php');
    exit(0);
}


?>