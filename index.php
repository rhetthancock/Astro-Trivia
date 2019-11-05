<?php session_start(); ?>
<?php require_once("header.php"); ?>
<div class="tile wrapper">
    <h1>Astronomy Trivia</h1>
    <p id="about">Test your knowledge of our solar system, one of 200 billion systems in the entire Milky Way galaxy. Despite the mind-boggling size of our universe, there is so much wonder to be found here in our cosmic neighborhood.</p>
    <div class="about-planets">
        <img alt="Sun" class="about-planet" src="images/sun.png">
        <img alt="Mercury" class="about-planet" src="images/mercury.png">
        <img alt="Venus" class="about-planet" src="images/venus.png">
        <img alt="Earth" class="about-planet" src="images/earth.png">
        <img alt="Mars" class="about-planet" src="images/mars.png">
        <img alt="Jupiter" class="about-planet" src="images/jupiter.png">
        <img alt="Saturn" class="about-planet" src="images/saturn.png">
        <img alt="Uranus" class="about-planet" src="images/uranus.png">
        <img alt="Neptune" class="about-planet" src="images/neptune.png">
    </div>
    <a class="button full" href="quiz.php">Play Trivia Game</a>
</div>
<?php require_once("footer.php"); ?>