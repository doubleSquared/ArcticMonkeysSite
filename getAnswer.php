
<?php

include ("connection.php");
//get parameters from url
$ID = $_REQUEST["ID"];
$answer = $_REQUEST["An"];

$query = "SELECT n_Answer FROM `questions` WHERE ID=" .$ID;
$result = mysqli_query($link,$query);
$row = mysqli_fetch_array($result);
$correct = $row['n_Answer'];

if ($correct == $answer)
{
    echo 1;//for true

}
else {
    echo 0;//for false
}

