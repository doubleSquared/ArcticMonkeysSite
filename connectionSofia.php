<?php
	$link = @mysqli_connect("localhost","***","***", "***");

	if (!$link) {
		echo '<p>Error: I didn\'t manage to connect to the database :( <br>';  
		echo 'Please try again.</p>';
		exit(); 
	}
?>
