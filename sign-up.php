<?php session_start(); ?>
<?php require_once("header.php"); ?>
<div class="tile wrapper">
    <h1>Register Account</h1>
    <form action="create-account.php" id="register" method="post">
        <div class="input">
            <label>Your Name</label>
            <input <?php echo isset($_SESSION["errors"]["name"]) ? "class='error'" : '' ?> type="text" name="name" maxlength="64" placeholder="John Doe" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>">
            <?php if(isset($_SESSION["errors"]["name"])) {
                $error = $_SESSION["errors"]["name"];
                echo "<span class='error-text'>$error</span>";
            } ?>
        </div>
        <div class="input">
            <label>Username</label>
            <input <?php echo isset($_SESSION["errors"]["username"]) ? "class='error'" : '' ?> type="text" name="username" maxlength="32" placeholder="Doemaster3000" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : '' ?>">
            <?php if(isset($_SESSION["errors"]["username"])) {
                $error = $_SESSION["errors"]["username"];
                echo "<span class='error-text'>$error</span>";
            } ?>
        </div>
        <div class="input">
            <label>Email Address</label>
            <input <?php echo isset($_SESSION["errors"]["email"]) ? "class='error'" : '' ?> type="text" name="email" maxlength="256" placeholder="johndoe@mail.com"  value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>">
            <?php if(isset($_SESSION["errors"]["email"])) {
                $error = $_SESSION["errors"]["email"];
                echo "<span class='error-text'>$error</span>";
            } ?>
        </div>
        <div class="input">
            <label>Confirm Email Address</label>
            <input <?php echo isset($_SESSION["errors"]["email-confirm"]) ? "class='error'" : '' ?> type="text" name="email-confirm" maxlength="256" placeholder="johndoe@mail.com" value="<?php echo isset($_SESSION['emailConfirm']) ? $_SESSION['emailConfirm'] : '' ?>">
            <?php if(isset($_SESSION["errors"]["email-confirm"])) {
                $error = $_SESSION["errors"]["email-confirm"];
                echo "<span class='error-text'>$error</span>";
            } ?>
        </div>
        <div class="input">
            <label>Password</label>
            <input <?php echo isset($_SESSION["errors"]["password"]) ? "class='error'" : '' ?> type="password" name="password" maxlength="32" placeholder="○○○○○○○○○○○○">
            <?php if(isset($_SESSION["errors"]["password"])) {
                $error = $_SESSION["errors"]["password"];
                echo "<span class='error-text'>$error</span>";
            } ?>
        </div>
        <div class="input">
            <label>Confirm Password</label>
            <input <?php echo isset($_SESSION["errors"]["password-confirm"]) ? "class='error'" : '' ?> type="password" name="password-confirm" maxlength="32" placeholder="○○○○○○○○○○○○">
            <?php if(isset($_SESSION["errors"]["password-confirm"])) {
                $error = $_SESSION["errors"]["password-confirm"];
                echo "<span class='error-text'>$error</span>";
            } ?>
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
        <button class="submit" type="submit">Create Account</button>
    </form>
</div>
<?php require_once("footer.php"); ?>