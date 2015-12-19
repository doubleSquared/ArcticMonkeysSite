<?php
<<<<<<< HEAD
//Connecting to database file

$host = "localhost";
$user="user_q";
$password ="5PZAyCjMUXHT3sHT";
$db="quiz";

$link= @mysqli_connect($host,$user,$password,$db);

if(!$link){
   echo "Problem connecting to the database, please try again later";
}
=======
	$link = @mysqli_connect("localhost","syfantid","3Bm2BsFilms10%", "syfantid_");

	if (!$link) {
		echo '<p>Error: I didn\'t manage to connect to the database :( <br>';  
		echo 'Please try again.</p>';
		exit(); 
	}
?>
>>>>>>> origin/master
