<?php 
session_start();

$servername = "localhost";

$conn = mysqli_connect($servername, "root", "", "ecommerce");

if (isset($_POST['register_button'])) {

	
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$password2 = mysqli_real_escape_string($conn, $_POST['password2']);

	$sql1 = "SELECT * FROM users WHERE full_name = '$username'";
	$result1 = mysqli_query($conn, $sql1); 

	if (mysqli_num_rows($result1) >= 1) {
		$_SESSION['message'] = "Username existed in database";
	} else {
		if (strlen($username) == 0 || strlen($email) == 0 || strlen($password) == 0 || strlen($password2) == 0 ) {
			$_SESSION['message'] = "Not enough info!"; 
		}  else	if ($password == $password2) {
		//create user to enter database
			$createUser = "CREATE USER '$username'@'localhost' IDENTIFIED BY '$password'";
			mysqli_query($conn, $createUser); 
			// insert user
			$password = md5($password); //hash the password.
			$sql = "INSERT INTO users(full_name, email, password) VALUES('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			$sql2 = "GRANT SELECT, ALTER, CREATE TEMPORARY TABLES, EXECUTE ON *.* TO '$username'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;";
			mysqli_query($conn, $sql2);
			
			$_SESSION['message'] = "You are logged in";
			$_SESSION['username'] = $username;
			header("location: index.php"); //redirect to home after registering successfully
		} else {
			$_SESSION['message'] = "2 passwords do not match, make sure those 2 are matched!";
		}
	}
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</head>
<body>
	<div class="header"> 
		<h1> Register, Log in, Log out </h1>
	</div>

	<?php 
	if (isset($_SESSION['message'])) {
		echo "<div id = 'error_msg'>".$_SESSION['message']."</div";
		unset($_SESSION['message']);
	} ?>

	<form method="POST" action="register.php">
		<table>
			<tr>
				<td>Username: </td>
				<td><input type="text" name="username" class="textInput"></td>
			</tr>

			<tr>
				<td>Email: </td>
				<td><input type="email" name="email" class="textInput"></td>
			</tr>

			<tr>
				<td>Password: </td>
				<td><input type="password" name="password" class="textInput"></td>
			</tr>

			<tr>
				<td>Re-type Password: </td>
				<td><input type="password" name="password2" class="textInput"></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" name="register_button" value="Register" class="btn btn-primary"></td>
			</tr>
		</table>
	</form>
</body>
</html>