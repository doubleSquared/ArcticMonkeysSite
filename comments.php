<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Arctic Monkeys - Comments</title>
		<meta charset="utf-8"/>
		<meta name="desctiption" content="This page is a comments' page about an English rock band called Arctic Monkeys"/>
		<link rel="icon" type="image/ico" href="images/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
	</head>
	<body>
		<div id="wrapper">
		
			<div id="header">
				<a href="index.html"> <img class="logo" src="images/logo.png" alt="Arctic Monkeys"/> </a>
				<div id="menu">
					<nav>
						<ul>
						   <li id="menuHome" ><a href="index.html">Home</a></li>
						   <li id="menuNews" ><a href="news.html">News</a></li>
						   <li id="menuMedia"><a href="media.html">Media</a></li>
						   <li id="menuDiscography"><a href="news.html">Discography</a></li>
						   <li id="menuBio"><a href="bio.html">Bio</a></li>
						   <li id="menuComments" class="active">Comments</li>
                            <li id="menuQuiz"><a href="quiz.php">Quiz</a> </li>
						</ul>
					</nav>
				</div>
			</div>	
			
			<div id="content">
				<h1>Comments</h1>
				<div id="comments">
					<h2>Leave your comments below:</h2>
					<form id="form1" name="form1" method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
						<fieldset>
							<legend>Submit your comment</legend>
							<p>
								<label for="email">Email:</label>
								<input id="email" type="email" name="email"/> 
							</p>
							<p>
								<label for="comment">Comment:</label> 
								<span class="error">*</span><br>
								<textarea id="comment" name="comment" rows=8 cols=90 required></textarea>	
							</p>
						</fieldset>
						<p>
							<label>
							<input type="submit" name="submit" value="Submit"/>
							</label>
						</p>
					</form>
				</div>
			</div>
			
			<?php
				include("connection.php");

				$query = "SELECT * FROM comments";
				$results = mysqli_query($link, $query);
				echo "<table style='border-collapse: collapse'>\n";
				while ($row = mysqli_fetch_assoc($results)) {
					echo "<tr>\n";
					echo "<td style='border: thin solid;'>" . htmlspecialchars($row['email']) . "</td>\n";
					echo "<td style='border: thin solid;'>" . htmlspecialchars($row['comment']) . "</td>\n";
					echo "</tr>\n";
				}
				echo "</table>\n"; 			
						
				if ($_GET['submit']) {
					if (isset($_GET['comment'])) {
						$comment = addslashes($_GET['comment']);
						$email = addslashes($_GET['email']);
						$query = "INSERT INTO comments (email, comment) VALUES ('$email','$comment')";
						$results = mysqli_query($link, $query);
					}
				}
				@mysqli_close($link);
			?>	
						
			<div id="footer">
				<footer><small>Copyright &copy; 2015 - <a href="mailto:lathanag@csd.auth.gr">Athanasios Lagopoulos</a></small></footer> 
			</div>
		</div>
	</body>
</html>