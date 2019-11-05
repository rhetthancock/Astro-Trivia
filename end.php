<?php
session_start();
if(isset($_SESSION["state"])) {
    $_SESSION["state"] = "score";
    header("Location: quiz_handler.php");
}
else {
    header("Location: quiz.php");
}