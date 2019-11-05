<?php
session_start();
require_once("Dao.php");
require_once("header.php");

$dao = new DAO();
$scores = $dao->getScores();
?>
<div class="tile wrapper">
    <h1>High Scores</h1>
    <?php
    $rank = 1;
    foreach($scores as $score) {
        echo "<div class='score-row'>";
        echo "<span class='rank'>" . $rank++ . "</span>";
        echo "<span class='name'>" . $score["username"] . "</span>";
        echo "<span class='score'>" . $score["score"] . "</span>";
        echo "</div>";
    }
?>
</div>
<?php require_once("footer.php"); ?>