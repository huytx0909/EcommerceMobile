<?php
	 session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>The home page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h1> Logged in </h1>
</div>

<?php 
if (isset($_SESSION['message'])) {
 	echo "<div id = 'error_msg'>".$_SESSION['message']."</div";
 	unset($_SESSION['message']);
 } ?>

<div>
	<h2> Welcome 
	<?php  
		$username = $_SESSION['username']; 
			echo $username;
	?> 
	</h2>
</div>
<div>
	<a href="logout.php">
	<input type="submit" name="logout_button" value="Log out">
</a>
</div>
</body>
</html>