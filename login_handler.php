<?php
session_start();
require_once("Dao.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $dao = new DAO();
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    
    $_SESSION["errors"] = array();
    
    if(empty($username)) {
        $_SESSION["errors"]["username"] = "Empty Username";
    }
    if(empty($password)) {
        $_SESSION["errors"]["password"] = "Empty Password";
    }
    else {
        if(!$dao->authenticate($username, $password)) {
            $_SESSION["errors"]["username"] = "";
            $_SESSION["errors"]["password"] = "Invalid Username or Password";
        }
    }
    $_SESSION["username"] = $username;
    if(count($_SESSION["errors"]) > 0) {
        header("Location: login.php");
    }
    else {
        $_SESSION["logged_in"] = true;
        header("Location: account.php");
    }
}
else {
    header("Location: login.php");
    exit();
}