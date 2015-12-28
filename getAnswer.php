
<?php

//connect to database
include ("connection.php");

//get parameters from url
$ID = $_REQUEST["ID"];
$answer = $_REQUEST["An"];

//query to get the answer of the ID question
$query = "SELECT n_Answer FROM `questions` WHERE ID=" .$ID;
$result = mysqli_query($link,$query);
$row = mysqli_fetch_array($result);
$correct = $row['n_Answer'];


//if the answer is equal to user choice
if ($correct == $answer)
{
    echo 1;//for true - correct choice

}
else {
    echo 0;//for false - incorrect choice
}

