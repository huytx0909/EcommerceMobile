<?php 
$conn = mysqli_connect("localhost","huy", "huy123", "ecommerce");
if ($conn) {
	echo "Querying Users.....";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Change user status</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>

<body>
	<h2>Add User</h2>
	<form method="POST" action="changeUser.php">

		<table>
			<tr>
				<td>Username:</td>
				<td><input type="text" name="newUserName" class="textInput"></td>
			</tr>

			<tr>
				<td>User email: </td>
				<td><input type="email" name="newEmail" class="textInput"></td>
			</tr>

			<tr>
				<td>User password:</td>
				<td><input type="password" name="newPassword" class="textInput"></td>
			</tr>

			<tr>
				<td>Re-type user password:</td>
				<td><input type="password" name="newPassword2" class="textInput"></td>
			</tr>
		</table>

		
		<h2>Delete User</h2>
		<h3>Input the user ID AND username(*)</h3>
		<table>
			<tr>
				<td>username:</td>
				<td><input type="text" name="existingName" class="textInput" required="true"></td>
			</tr>

			<tr>
				<td>user ID:</td>
				<td><input type="text" name="existingID" class="textInput" required="true"></td>
			</tr>

		</table>
		<br>
		<br>
		<table>
			<tr>
				<td></td>
				<td><input type="submit" name="Submit_button" value="Submit"></td>
			</tr>
		</table>
	</form>

	<?php 

	if (isset($_POST['Submit_button'])) {
	//Add Product:
		$newUserName = mysqli_real_escape_string($conn, $_POST['newUserName']);
		$newUserEmail = mysqli_real_escape_string($conn, $_POST['newEmail']);
		$newUserPass = mysqli_real_escape_string($conn, $_POST['newPassword2']);
		$newUserPass2 = mysqli_real_escape_string($conn, $_POST['newPassword2']);

		$sql1 = "SELECT * FROM users WHERE full_name = '$newUserName'";
		$result1 = mysqli_query($conn, $sql1); 

		if (mysqli_num_rows($result1) >= 1) {
			$_SESSION['message'] = "Username existed in database";
		} else {
			if (strlen($newUserName) == 0 || strlen($newUserEmail) == 0 || strlen($newUserPass) == 0 || strlen($newUserPass2) == 0 ) {
				$_SESSION['message'] = "Not enough info!"; 
			}  else	if ($newUserPass == $newUserPass2) {
		//create user to enter database
				$createUser = "CREATE USER '$newUserName'@'localhost' IDENTIFIED BY '$newUserPass'";
				mysqli_query($conn, $createUser); 
			// insert user
			$newUserPass = md5($newUserPass); //hash the password.
			$sql = "INSERT INTO users(full_name, email, password) VALUES('$newUserName', '$newUserEmail', '$newUserPass')";
			$result = mysqli_query($conn, $sql);
			$sql2 = "GRANT SELECT, ALTER, CREATE TEMPORARY TABLES, EXECUTE ON *.* TO '$newUserName'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;";
			mysqli_query($conn, $sql2);
	 // mysqli_query($conn, $sqlA);
			
			

			
	// Delete user in table:
			$existingUserName = mysqli_real_escape_string($conn, $_POST['existingName']);
			$existingUserID = mysqli_real_escape_string($conn, $_POST['existingID']);
			if (strlen($existingUser)===0) {
				$sqlD = "DELETE FROM users WHERE id = '$existingID'";
				$DeleteRs = mysqli_query($conn, $sqlD);
			} else {
				$sqlD = "DELETE FROM users WHERE full_name='$existingUserName' or id = '$existingID'";
				$DeleteRs1 = mysqli_query($conn, $sqlD);
			}
	//Delete user previlege:
			$sqlDelete = "DROP user '$existingUserName'";
		}
	}
}
?>
</body>
</html>