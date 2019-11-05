<?php session_start(); ?>
<?php require_once("header.php"); ?>
<div class="tile wrapper">
    <h1>Log-In</h1>
    <form action="login_handler.php" id="log-in" method="post">
        <div class="input">
            <label>Username</label>
            <input <?php echo isset($_SESSION["errors"]["username"]) ? "class='error'" : '' ?> type="text" name="username" placeholder="Doemaster3000" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : '' ?>">
            <?php if(isset($_SESSION["errors"]["username"])) {
                $error = $_SESSION["errors"]["username"];
                echo "<span class='error-text'>$error</span>";
            } ?>
        </div>
        <div class="input">
            <label>Password</label>
            <input <?php echo isset($_SESSION["errors"]["password"]) ? "class='error'" : '' ?> type="password" name="password" placeholder="○○○○○○○○○○○○">
            <?php if(isset($_SESSION["errors"]["password"])) {
                $error = $_SESSION["errors"]["password"];
                echo "<span class='error-text'>$error</span>";
            } ?>
        </div>
        <button class="submit" type="submit">Log-In</button>
    </form>
</div>
<?php require_once("footer.php"); ?>