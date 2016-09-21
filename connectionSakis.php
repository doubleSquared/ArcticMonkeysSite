<?php
//Connecting to database file

$host = "localhost";
$user="***";
$password ="***";
$db="***";

$link= @mysqli_connect($host,$user,$password,$db);

if(!$link){
    echo "Problem connecting to the database, please try again later";
}
?>
