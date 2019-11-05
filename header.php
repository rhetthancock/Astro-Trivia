<?php
$quizWord = "Start";
if(isset($_SESSION["state"])) {
    if($_SESSION["state"] != "start") {
        $quizWord = "Continue";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>AstroTrivia</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Righteous|Roboto&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="functions.js"></script>
</head>
<body>
    <canvas id="background"></canvas>
    <div id="main">
        <header>
            <nav id="menu">
                <a class="<?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'active'; ?>" href="index.php" id="logo">
                    <span id="logo-left">Astro</span>
              
                    <img alt="" id="logo-img" src="images/logo.png">
                    <span id="logo-right">Trivia</span>
                </a>
                <?php if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) { ?>
                <a class="<?php if(basename($_SERVER['PHP_SELF']) == 'account.php') echo 'active'; ?> half left" href="account.php">Account</a>
                <a class="<?php if(basename($_SERVER['PHP_SELF']) == 'logout.php') echo 'active'; ?> half right" href="logout.php">Log-Out</a>
                <?php } else { ?>
                <a class="<?php if(basename($_SERVER['PHP_SELF']) == 'sign-up.php') echo 'active'; ?> half left" href="sign-up.php">Sign-Up</a>
                <a class="<?php if(basename($_SERVER['PHP_SELF']) == 'login.php') echo 'active'; ?> half right" href="login.php">Log-In</a>
                <?php } ?>
                <a class="<?php if(basename($_SERVER['PHP_SELF']) == 'quiz.php') echo 'active'; ?>" href="quiz.php"><?php echo $quizWord ?> Quiz</a>
                <?php
                if(isset($_SESSION["endless"])) {
                    if($_SESSION["endless"]) {
                        echo "<a href='end.php'>End Quiz</a>";
                    }
                }
                if(isset($_SESSION["state"])) {
                    if($_SESSION["state"] != "start" && $_SESSION["state"] != "score") {
                        echo "<a href='reset.php'>Reset Quiz</a>";
                    }
                }
                ?>
                <a class="<?php if(basename($_SERVER['PHP_SELF']) == 'scores.php') echo 'active'; ?>" href="scores.php">High Scores</a>
                <!--<a class="<?php if(basename($_SERVER['PHP_SELF']) == 'learn.php') echo 'active'; ?>" href="learn.php">Learn</a>-->
                <!--<a class="<?php if(basename($_SERVER['PHP_SELF']) == 'contribute.php') echo 'active'; ?>" href="contribute.php">Contribute</a>-->
                <a id="nav-handle">
                    <div class="nav-handle-bar"></div>
                    <div class="nav-handle-bar"></div>
                    <div class="nav-handle-bar"></div>
                </a>
            </nav>
            <section id="sub">
                <p id="copywrite">Copywrite &copy; <?php echo date("Y"); ?> - Rhett Hancock</p>
                <p id="icons8">Icons from <a href="https://www.icons8.com" target="_blank">icons8.com</a></p>
            </section>
        </header>
        <section id="content">