<!DOCTYPE html>
<html lang="en">
<head>
    <title>Arctic Monkeys - Quiz</title>
    <meta charset="utf-8"/>
    <meta name="description" content="Arctic Monkeys' fan quiz"/>
    <link rel="icon" type="image/ico" href="images/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
</head>
<body>
<?php


include("connection.php");
$query = " SELECT ID, Question, Answer_1, Answer_2, Answer_3, Answer_4 FROM `questions`";
$results = mysqli_query($link,$query);
$num_results = mysqli_num_rows($results);

?>
<div id="wrapper">
    <header>
        <img class="logo" src="images/logo.png" alt="Arctic Monkeys"/>
        <div id="menu">
            <nav>
                <ul>
                    <li id="menuHome"><a href="index.html"> Home</a></li>
                    <li id="menuNews"><a href="news.html">News</a></li>
                    <li id="menuMedia"><a href="media.html">Media</a></li>
                    <li id="menuDiscography"><a href="discography.html">Discography</a></li>
                    <li id="menuBio"><a href="bio.html">Bio</a></li>
                    <li id="comments"><a href="comments.php">Comments</a> </li>
                    <li id="menuQuiz" class="active">Quiz</li>
                </ul>
            </nav>
        </div>
    </header>
    <div id="content">
        <h1 >Quiz</h1>
        <div id="quiz">

            <div id="question">
                <div id="score">
                </div>

                <?php

                while ($que = mysqli_fetch_array($results)) {

                    $ID= $que['ID'];
                    $Question = $que['Question'];
                    $Answer1 = $que['Answer_1'];
                    $Answer2 = $que['Answer_2'];
                    $Answer3 = $que['Answer_3'];
                    $Answer4 = $que['Answer_4'];
                    echo '<form id="question'. $ID . '" >';
                    echo '<label><p><h3>' . $Question . '</h3></p></label>';
                    echo '<label><input type="radio" name="answer'. $ID .'" value="1" >' . $Answer1 . '</label><br>';
                    echo '<label><input type="radio" name="answer'. $ID .'" value="2" >' . $Answer2 . '</label><br>';
                    echo '<label><input type="radio" name="answer'. $ID .'" value="3" >' . $Answer3 . '</label><br>';
                    echo '<label><input type="radio" name="answer'. $ID .'" value="4" >' . $Answer4 . '</label><br>';
                    echo '</form>';
                }
                ?>
                <img class="imgquiz" id="correct" src="images/correct.png" alt="Correct"/>
                <img class="imgquiz" id="incorrect" src="images/incorrect.png" alt="Inorrect"/>
            </div>
            <button id="checkButton" type="button">Check Answer</button>
            <small id="qNumber">Question Number</small>





        </div>
    </div>

    <footer><small>Copyright &copy; 2015 - <a href="mailto:lathanag@csd.auth.gr">Athanasios Lagopoulos</a></small></footer>
</div>
<script
    src="scripts/quizcheck.js"
    type="text/javascript">
</script>
</body>

</html>