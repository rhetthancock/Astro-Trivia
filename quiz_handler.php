<?php
session_start();
require_once("Dao.php");
require_once("QuestionGenerator.php");

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["state"])) {
    $generator = new QuestionGenerator();
    if($_SESSION["state"] == "start" || $_SESSION["state"] == "custom") {
        $questions = array();
        if($_SESSION["state"] == "start") {
            if(isset($_POST["custom"])) {
                $_SESSION["state"] = "custom";
            }
            else {
                if(isset($_POST["option-1"])) {
                    $_SESSION["num_questions"] = $_POST["option-1"];
                }
                else if(isset($_POST["option-2"])) {
                    $_SESSION["num_questions"] = $_POST["option-2"];
                }
                else if(isset($_POST["endless"])) {
                    $_SESSION["num_questions"] = 1;
                    $_SESSION["endless"] = true;
                }
            }
        }
        else if($_SESSION["state"] == "custom") {
            $val = intval($_POST["num_questions"]);
            if(is_int($val) && $val > 0) {
                $_SESSION["num_questions"] = intval($_POST["num_questions"]);
            }
        }
        if(isset($_SESSION["num_questions"])) {
            for($i = 0; $i < $_SESSION["num_questions"]; $i++) {
                $question = $generator->generateQuestion();
                array_push($questions, $question);
            }
            $_SESSION["questions"] = $questions;
            $_SESSION["current"] = 1;
            $_SESSION["answered"] = 0;
            $_SESSION["state"] = "question";
        }
    }
    else if($_SESSION["state"] == "question") {
        if(isset($_POST["prev"])) {
            $_SESSION["state"] = "answer";
            $_SESSION["current"] = $_SESSION["current"] - 1;
        }
        else {
            $userAnswer = "";
            if(isset($_POST["option-1"])) {
                $userAnswer = $_POST["option-1"];
            }
            else if(isset($_POST["option-2"])) {
                $userAnswer = $_POST["option-2"];
            }
            else if(isset($_POST["option-3"])) {
                $userAnswer = $_POST["option-3"];
            }
            else if(isset($_POST["option-4"])) {
                $userAnswer = $_POST["option-4"];
            }
            if($userAnswer == $_SESSION["questions"][$_SESSION["current"] - 1]["correct"]) {
                $_SESSION["score"] = $_SESSION["score"] + $_SESSION["questions"][$_SESSION["current"] - 1]["points"];
            }
            $_SESSION["questions"][$_SESSION["current"] - 1]["userAnswer"] = $userAnswer;
            $_SESSION["answered"] = $_SESSION["answered"] + 1;
            $_SESSION["state"] = "answer";
        }
    }
    else if($_SESSION["state"] == "answer") {
        if(isset($_POST["prev"])) {
            $_SESSION["current"] = $_SESSION["current"] - 1;
        }
        else if(isset($_POST["next"])) {
            if(isset($_SESSION["endless"])) {
                if($_SESSION["endless"] == true) {
                    $newQuestion = $generator->generateQuestion();
                    array_push($_SESSION["questions"], $newQuestion);
                    $_SESSION["num_questions"] = $_SESSION["num_questions"] + 1;
                }
            }
            if($_SESSION["current"] < $_SESSION["num_questions"]) {
                $_SESSION["current"] = $_SESSION["current"] + 1;
                if($_SESSION["current"] > $_SESSION["answered"]) {
                    $_SESSION["state"] = "question";
                }
            }
            else {
                $_SESSION["state"] = "score";
            }
        }
    }
    else if($_SESSION["state"] == "score") {
        $reset = false;
        if(isset($_POST["submit-score"])) {
            echo "SUBMIT" . $_SESSION["username"] . " " . $_SESSION["score"];
            $dao = new DAO();
            $dao->submitScore($_SESSION["username"], $_SESSION["score"]);
            $reset = true;
        }
        if(isset($_POST["reset"]) || $reset) {
            $_SESSION["state"] = "start";
            unset($_SESSION["answered"]);
            unset($_SESSION["current"]);
            unset($_SESSION["endless"]);
            unset($_SESSION["num_questions"]);
            unset($_SESSION["score"]);
        }
        if(isset($_POST["submit-score"])) {
            header("Location: scores.php");
            exit();
        }
    }
}
header("Location: quiz.php");