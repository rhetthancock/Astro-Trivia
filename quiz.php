<?php 
session_start();
require_once("header.php");

if(!isset($_SESSION["state"])) {
    $_SESSION["state"] = "start";
}
if(!isset($_SESSION["current"])) {
    $_SESSION["current"] = 1;
}
if(!isset($_SESSION["score"])) {
    $_SESSION["score"] = 0;
}
else {
    $current = $_SESSION["current"];
    $disabled = "";
    if(isset($_SESSION["questions"]) && isset($_SESSION["questions"][$current - 1])) {
        $question = $_SESSION["questions"][$current - 1];
    }
    if($current == 1) {
        $disabled = "disabled";
    }
}

if($_SESSION["state"] == "start") { ?>
    <div class="tile wrapper">
        <h1>Start Quit</h1>
        <p>How many questions would you like to complete?</p>
        <form action="quiz_handler.php" class="responses" method="post">
            <button name="option-1" type="submit" value="5">5 Questions</button>
            <button name="option-2" type="submit" value="10">10 Questions</button>
            <button name="endless" type="submit" value="endless">Endless</button>
            <button name="custom" type="submit" value="custom">Custom</button>
        </form>
    </div>    
<?php } else if($_SESSION["state"] == "custom") { ?>
    <script type="text/javascript" src="custom.js"></script>
    <div class="tile wrapper">
        <h1>Start Quiz</h1>
        <p>Choose number of questions to complete:</p>
        <form action="quiz_handler.php" id="custom" method="post">
            <button id="minus" onclick="minus" type="button">-</button>
            <input id="num_questions" name="num_questions" type="text" value="10">
            <button id="plus" onclick="plus" type="button">+</button>
            <button class="full" name="next" type="submit" value="next">Next</button>
        </form>
    </div>
<?php } else if($_SESSION["state"] == "question") { ?>
    <div class="tile wrapper">
        <h1>Question <?php echo $current; ?>:</h1>
        <p><?php echo $question["question"]; ?></p>
        <form action="quiz_handler.php" class="responses" method="post">
            <?php
                $num = 1;
                foreach($question["answers"] as $planet) {
                    echo "<button class='icon' id='$planet' name='option-$num' type='submit' value='$planet'>$planet</button>";
                    $num++;
                }
            ?>
        </form>
    </div>
    <div class="bar tile">
        <form action="quiz_handler.php" id="bar" method="post">
            <button <?php echo $disabled ?> id="prev" name="prev" type="submit">Previous</button>
            <span id="score">Score <?php echo $_SESSION["score"] ?></span>
            <button disabled name="next" id="next" type="submit">Next</button>
        </form>
    </div>
<?php } else if($_SESSION["state"] == "answer") { ?>
    <div class="tile wrapper">
        <h1>Question <?php echo $current; ?>:</h1>
        <p><?php echo $question["question"]; ?></p>
        <form action="quiz_handler.php" class="responses" method="post">
            <?php
                $num = 1;
                foreach($question["answers"] as $planet) {
                    $status = "";
                    if($planet == $question["userAnswer"]) {
                        if($question["userAnswer"] == $question["correct"]) {
                            $status = "correct";
                        }
                        else {
                            $status = "incorrect";
                        }
                    }
                    echo "<button class='$status icon' disabled id='$planet' name='option-$num' type='submit' value='$planet'>$planet</button>";
                    $num++;
                }
            ?>
        </form>
    </div>
    <div class="bar tile">
        <form action="quiz_handler.php" id="bar" method="post">
            <button <?php echo $disabled ?> id="prev" name="prev" type="submit">Previous</button>
            <span id="score">Score <?php echo $_SESSION["score"] ?></span>
            <button id="next" name="next" type="submit">Next</button>
        </form>
    </div>
<?php } else if($_SESSION["state"] == "score") { ?>
    <div class="tile wrapper">
        <h1>Results</h1>
        <div class="results">
            <?php $num = 1; ?>
            <?php foreach($_SESSION["questions"] as $question) { ?>
                <div class="result">
                    <span class="result-qnum"><?php echo $num; ?>.</span>
                    <p class="result-question"><?php echo $question["question"] ?></p>
                    <div class="answers">
                        <?php foreach($question["answers"] as $answer) {
                            echo "<button class='icon' disabled id='$answer'>$answer</button>";
                        } ?>
                    </div>
                    <div class="user-data">
                        <?php $planet = $question["userAnswer"];
                        $status = "";
                        $points = 0;
                        if($question["userAnswer"] == $question["correct"]) {
                            $status = "correct";
                            $points = $question["points"];
                        }
                        else {
                            $status = "incorrect";
                        } ?>
                        <div class="user-data-row">
                            <label>Your Answer</label>
                            <?php echo "<button class='$status full icon' disabled id='$planet'>$planet</button>"; ?>
                        </div>
                        <div class="user-data-row">
                            <label>Points</label>
                            <?php echo "<div class='points'>$points</div>" ?>
                        </div>
                    </div>
                </div>
            <?php $num++; ?>
            <?php } ?>
        </div>
        <form action="quiz_handler.php" class="responses" method="post">
            <button <?php echo (!isset($_SESSION["logged_in"])) ? 'class="full"' : ''; ?> name="reset" type="submit" value="reset">Restart</button>
            <?php if(isset($_SESSION["logged_in"])) { ?>
                <button name="submit-score" type="submit" value="submit">Submit Score</button>
            <?php } ?>
        </form>
    </div>
<?php } ?>
<?php require_once("footer.php"); ?>