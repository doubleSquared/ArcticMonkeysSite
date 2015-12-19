<?php
//Connecting to database file

$host = "localhost";
$user="user_q";
$password ="5PZAyCjMUXHT3sHT";
$db="quiz";

$link= @mysqli_connect($host,$user,$password,$db);

if(!$link){
   echo "Problem connecting to the database, please try again later";
}
