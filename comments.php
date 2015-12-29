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
					<!-- Comments' form -->
					<form id="form1" name="form1" method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
						<fieldset>
							<legend>Submit your comment</legend>
							<p>
								<label for="email">Email:</label>
								<input id="email" type="email" name="email"/> <!-- Validation check is done by HTML 5.0 and type email -->
							</p>
							<p>
								<label for="comment">Comment:</label> 
								<span class="error">*</span><br>
								<textarea id="comment" name="comment" rows=8 cols=90 required></textarea> <!-- Using attribute required to make field comment required -->
							</p>
						</fieldset>
						<p>
							<label>
							<input type="submit" name="submit" value="Submit"/>
							</label>
						</p>
					</form>
				</div>
				<h2>Check out more comments</h2>
			
				<?php
					include("connection.php"); // Connect to DB
					
					/* Get total number of comments */
					$query = "SELECT COUNT(1) FROM comments";
					$result = mysqli_query($link, $query);
					$row = mysqli_fetch_array($result);
					$total = $row[0];

					$limit = 10; // Comments per page
					
					/* Number of pages needed for all comments */
					$totalPages = ceil($total / $limit);
					
					/* Set current page and offset from the first comment (depends on current page) */
					if(isset($_GET['currentPage'])) {
						$currentPage = $_GET['currentPage'];
						/* Check if currentPage is within limits (In case the user tampers with the url)*/
						if ($currentPage < 1) {
							$currentPage = 1;
						} elseif($currentPage > $totalPages) {
							$currentPage = $totalPages;
						} 
						$offset = $total - $currentPage * $limit; // Calculate next page's offset
						if($offset < 0) { // Last page results
							$limit = -$offset;							
							$offset = 0;
						}
					} else { // Uninitialized - First page results
						$currentPage = 1;
						$offset = $total - $limit; // e.g. for total records 21 and limit 4 per page the first page presents records 18,19,20,21
					}
					
					$query = "SELECT * FROM (SELECT * FROM comments LIMIT $limit OFFSET $offset) AS T1 ORDER BY id DESC";
					$results = mysqli_query($link, $query);
					if (!$results) {
						printf("Error: %s\n", mysqli_error($link));
						exit();
					}

					while ($row = mysqli_fetch_assoc($results)) {
						$email = htmlspecialchars($row['email']); // Preventing XSS
						$comment = htmlspecialchars($row['comment']); // Preventing XSS
						$timestamp = date('j F Y',strtotime(htmlspecialchars($row['timestamp'])));
						if($email == "") {
							$email = "Anonymous";
						}
						echo "<span id='commenter'>Commenter: </span><span>$email</span></br>";
						echo "<span id='time'>$timestamp</span>";
						echo "<p id='comment'>$comment</p>";
						echo "<hr>";
					}	
					
					/* Show previous pages' links */
					if ($currentPage > 1) { // First page doesn't have a previous page
						echo " <a href='{$_SERVER['PHP_SELF']}?currentPage=1' class='button'>First</a> "; // Link to first page
						$previousPage = $currentPage - 1; // Previous page number
						echo " <a href='{$_SERVER['PHP_SELF']}?currentPage=$previousPage' class='button'>Previous</a> "; // Link to previous page
					} 
					
					/* Show next pages' links */  
					if ($currentPage != $totalPages) { // Last page doesn't have a next page 
						if ($currentPage == 1) { 
							echo " <span class='disabled button'>First</span> "; 
							echo " <span class='disabled button'>Previous</span> "; 
						}
						$nextPage = $currentPage + 1; // Next page number
						echo " <a href='{$_SERVER['PHP_SELF']}?currentPage=$nextPage' class='button'>Next</a> "; // Link to next page
						echo " <a href='{$_SERVER['PHP_SELF']}?currentPage=$totalPages' class='button'>Last</a>"; // Link to last page
					}

					/* Send data to DB */		
					if (isset($_GET['submit']) ? $_GET['submit'] : null) {
						if (isset($_GET['comment'])) {
							$comment = addslashes($_GET['comment']); // Preventing SQL Injection
							$email = addslashes($_GET['email']); // Preventing SQL Injection
							$query = "INSERT INTO comments (email, comment) VALUES ('$email','$comment')";
							$results = mysqli_query($link, $query);
						}
					}
					@mysqli_free_result($results);
					@mysqli_close($link);
				?>	
			</div>
						
			<div id="footer">
				<footer><small>Copyright &copy; 2015 - <a href="mailto:lathanag@csd.auth.gr">Athanasios Lagopoulos</a></small></footer> 
			</div>
		</div>
	</body>
</html>