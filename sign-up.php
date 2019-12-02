<?php session_start(); ?>
<?php require_once("header.php"); ?>
<script src="validate.js"></script>
<div class="tile wrapper">
    <h1>Register Account</h1>
    <form action="create-account.php" id="register" method="post">
        <div class="input" id="name-container">
            <label for="name">Your Name</label>
            <input <?php echo isset($_SESSION["errors"]["name"]) ? "class='error'" : '' ?> id="name" type="text" name="name" maxlength="64" placeholder="John Doe" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>">
            <?php if(isset($_SESSION["errors"]["name"])) {
                $error = $_SESSION["errors"]["name"];
                echo "<span class='error-text'>$error</span>";
            } ?>
        </div>
        <div class="input" id="username-container">
            <label for="username">Username</label>
            <input <?php echo isset($_SESSION["errors"]["username"]) ? "class='error'" : '' ?> id="username" type="text" name="username" maxlength="32" placeholder="Doemaster3000" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : '' ?>">
            <?php if(isset($_SESSION["errors"]["username"])) {
                $error = $_SESSION["errors"]["username"];
                echo "<span class='error-text'>$error</span>";
            } ?>
        </div>
        <div class="input" id="email-container">
            <label for="email">Email Address</label>
            <input <?php echo isset($_SESSION["errors"]["email"]) ? "class='error'" : '' ?> id="email" type="text" name="email" maxlength="256" placeholder="johndoe@mail.com"  value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>">
            <?php if(isset($_SESSION["errors"]["email"])) {
                $error = $_SESSION["errors"]["email"];
                echo "<span class='error-text'>$error</span>";
            } ?>
        </div>
        <div class="input" id="email-confirm-container">
            <label for="email-confirm">Confirm Email Address</label>
            <input <?php echo isset($_SESSION["errors"]["email-confirm"]) ? "class='error'" : '' ?> id="email-confirm" type="text" name="email-confirm" maxlength="256" placeholder="johndoe@mail.com" value="<?php echo isset($_SESSION['emailConfirm']) ? $_SESSION['emailConfirm'] : '' ?>">
            <?php if(isset($_SESSION["errors"]["email-confirm"])) {
                $error = $_SESSION["errors"]["email-confirm"];
                echo "<span class='error-text'>$error</span>";
            } ?>
        </div>
        <div class="input" id="password-container">
            <label for="password">Password</label>
            <input <?php echo isset($_SESSION["errors"]["password"]) ? "class='error'" : '' ?> id="password" type="password" name="password" placeholder="○○○○○○○○○○○○">
            <?php if(isset($_SESSION["errors"]["password"])) {
                $error = $_SESSION["errors"]["password"];
                echo "<span class='error-text'>$error</span>";
            } ?>
        </div>
        <div class="input" id="password-confirm-container">
            <label for="password-confirm">Confirm Password</label>
            <input <?php echo isset($_SESSION["errors"]["password-confirm"]) ? "class='error'" : '' ?> id="password-confirm" type="password" name="password-confirm" placeholder="○○○○○○○○○○○○">
            <?php if(isset($_SESSION["errors"]["password-confirm"])) {
                $error = $_SESSION["errors"]["password-confirm"];
                echo "<span class='error-text'>$error</span>";
            } ?>
        </div>
        <div class="indicator">
            <label for="password-strength">Password Strength</label>
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