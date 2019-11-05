<?php
session_start();
if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
    $_SESSION = array();
}
header("Location: index.php");