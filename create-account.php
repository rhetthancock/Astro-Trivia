<?php
session_start();
require_once("Dao.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $dao = new DAO();
    $name = trim($_POST["name"]);
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $emailConfirm = trim($_POST["email-confirm"]);
    $password = trim($_POST["password"]);
    $passwordConfirm = trim($_POST["password-confirm"]);
    
    $_SESSION["errors"] = array();
    
    // NAME CHECKS
    if(empty($name)) {
        $_SESSION["errors"]["name"] = "Empty Name";
    }
    else {
        if(!preg_match('/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$/', $name)) {
            $_SESSION["errors"]["name"] = "Invalid Name";
        }
    }
    // USERNAME CHECKS
    if(empty($username)) {
        $_SESSION["errors"]["username"] = "Empty Username";
    }
    else {
        if($dao->isUser($username)) {
            $_SESSION["errors"]["username"] = "Username Taken";
        }
    }
    // EMAIL CHECKS
    if(empty($email)) {
        $_SESSION["errors"]["email"] = "Empty Email";
    }
    else {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["errors"]["email"] = "Invalid Email";
        }
        else {
            if($email != $emailConfirm) {
                $_SESSION["errors"]["email-confirm"] = "Emails Don't Match";
            }
        }
    }
    if(empty($emailConfirm)) {
        $_SESSION["errors"]["email-confirm"] = "Email Confirm Empty";
    }
    // PASSWORD CHECKS
    if(empty($password)) {
        $_SESSION["errors"]["password"] = "Empty Password";
    }
    else {
        if(strlen($password) < 8) {
            $_SESSION["errors"]["password"] = "Must Be At Least 8 Characters";
        }
        else {
            if($password != $passwordConfirm) {
                $_SESSION["errors"]["password"] = "Passwords Don't Match";
                $_SESSION["errors"]["password-confirm"] = "";
            }
        }
    }
    if(empty($passwordConfirm)) {
        $_SESSION["errors"]["password-confirm"] = "Password Confirm Empty";
    }
    // HANDLE ERRORS
    if(count($_SESSION["errors"]) > 0) {
        $_SESSION["name"] = $name;
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        $_SESSION["emailConfirm"] = $emailConfirm;
        header("Location: sign-up.php");
    }
    else {
        $dao->createUser($name, $username, $email, $password);
        unset($_SESSION["errors"]);
        header("Location: new-account.php");
    }
}
else {
    header("Location: sign-up.php");
    exit();
}