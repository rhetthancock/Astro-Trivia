<?php
session_start();
require_once("header.php");

if(!isset($_SESSION["logged_in"])) {
    header("Location: login.php");
}

?>
<div class="tile wrapper">
    <h1>Hello <?php echo $_SESSION["username"]; ?></h1>
    <p>Your scores can be recorded to the high scores! In the future, this page will allow you to update your account information.</p>
    <a class="button full" href="quiz.php">Play Astronomy Trivia</a>
<!--
    <h2>Account Details</h2>
    <ul>
        <li>Name: </li>
        <li>Username: </li>
        <li>Email Address: </li>
    </ul>
    <h2>Statistics</h2>
    <ul>
        <li>Games Played:</li>
        <li>Average Score:</li>
    </ul>
    <h2>Change Email Address</h2>
    <form action="change-password.php" method="post">
        <div class="input">
            <label>Email Address</label>
            <input type="text" name="email address" maxlength="32" placeholder="johndoe@mail.com">
        </div>
        <div class="input">
            <label>Confirm Email Address</label>
            <input type="text" name="password-confirm" maxlength="32" placeholder="johndoe@mail.com">
        </div>
        <button class="submit" type="submit">Change Email</button>
    </form>
    <h2>Change Password</h2>
    <form action="change-password.php" method="post">
        <div class="input">
            <label>Password</label>
            <input type="password" name="password" maxlength="32" placeholder="○○○○○○○○○○○○">
        </div>
        <div class="input">
            <label>Confirm Password</label>
            <input type="password" name="password-confirm" maxlength="32" placeholder="○○○○○○○○○○○○">
        </div>
        <div class="indicator">
            <label>Password Strength</label>
            <div id="password-strength">
                <div class="tick"></div>
                <div class="tick"></div>
                <div class="tick"></div>
                <div class="tick"></div>
                <div class="tick"></div>
                <div class="tick"></div>
                <div class="tick"></div>
                <div class="tick"></div>
                <div class="tick"></div>
                <div class="tick"></div>
            </div>
        </div>
        <button class="submit" type="submit">Change Password</button>
    </form>
-->
</div>
<?php require_once("footer.php"); ?>