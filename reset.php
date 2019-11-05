<?php
session_start();
if(isset($_SESSION["state"])) {
    unset($_SESSION["state"]);
}
if(isset($_SESSION["answered"])) {
    unset($_SESSION["answered"]);
}
if(isset($_SESSION["current"])) {
    unset($_SESSION["current"]);
}
if(isset($_SESSION["endless"])) {
    unset($_SESSION["endless"]);
}
if(isset($_SESSION["num_questions"])) {
    unset($_SESSION["num_questions"]);
}
if(isset($_SESSION["score"])) {
    unset($_SESSION["score"]);
}
header("Location: quiz.php");