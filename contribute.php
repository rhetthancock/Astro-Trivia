<?php session_start(); ?>
<?php require_once("header.php"); ?>
<div class="tile wrapper">
    <h1>Contribute Content</h1>
    <form id="contribute" method="post">
        <div class="full input">
            <label>Question</label>
            <input type="text" name="question">
        </div>
        <div class="full input">
            <label>Answer</label>
            <input type="text" name="answer">
        </div>
        <button class="submit" type="submit">Submit Question</button>
    </form>
</div>
<?php require_once("footer.php"); ?>