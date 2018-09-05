<?php 


if (isset($_POST['register_button'])) {

	
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	$password2 = mysqli_real_escape_string($db, $_POST['password2']);

	$sql1 = "SELECT * FROM users WHERE full_name = '$username'";
	$result1 = mysqli_query($db, $sql1); 

	if (mysqli_num_rows($result1) >= 1) {
		$_SESSION['message'] = "Username existed in database";
	} else {

		if (strlen($username) == 0 || strlen($email) == 0 || strlen($password) == 0 || strlen($password2) == 0 ) {
			$_SESSION['message'] = "Not enough info!"; 
		} 
         $email_pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
		 if(!preg_match($email_pattern, $email)) {
			$_SESSION['message'] = "Invalid email"; 

		} else if(strlen($password) < 6) {
			$_SESSION['message'] = "password must be more than 6 characters"; 

		}


		  else	if ($password == $password2) {
		//create user to enter database
			$createUser = "CREATE USER '$username'@'localhost' IDENTIFIED BY '$password'";
			mysqli_query($db, $createUser); 
			// insert user
			$password = md5($password); //hash the password.
			$sql = "INSERT INTO users(full_name, email, password) VALUES('$username', '$email', '$password')";
			$result = mysqli_query($db, $sql);
			$sql2 = "GRANT SELECT, ALTER, CREATE TEMPORARY TABLES, EXECUTE ON *.* TO '$username'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;";
			mysqli_query($db, $sql2);
			
			$_SESSION['message'] = "You are logged in";
			$_SESSION['username'] = $username;

		
			header("location: index.php"); //redirect to home after registering successfully
           ?> <script type="text/javascript"> alert("registered and logged in successfully"); </script>
             <?php        
			
		} else {
			$_SESSION['message'] = "2 passwords do not match, make sure those 2 are matched!";
		}
	}
	
}
?>
   <div class="row">
   	<div class="col-md-4"></div>
   	<div class="col-md-4">

	<div class="header" align="center"> 
		<h1> Register </h1>
 <?php 
	if (isset($_SESSION['message'])) {
		echo "<div id = 'error_msg'>".$_SESSION['message']."</div";
		unset($_SESSION['message']);
	}    ?>
	</div>


	<form method="POST" action="index.php?page=register"  class="beta-form-checkout">
		<table>
			 <div class="form-group">
			<tr>
				<td>Username: </td>
				<td><input type="text" name="username" class="form-control" required></td>
			</tr>
		</div>

			 <div class="form-group">
			<tr>
				<td>Email: </td>
				<td><input type="email" name="email"  class="form-control" required></td>
			</tr>
             </div>
			 
			 <div class="form-group">
			<tr>
				<td>Password: </td>
				<td><input type="password" name="password"  class="form-control" required></td>
			</tr>
		</div>

			 <div class="form-group">
			<tr>
				<td>Re-type Password: </td>
				<td><input type="password" name="password2"  class="form-control" required></td>
			</tr>
		</div>

			<tr>
				<td></td>
				<td><input type="submit" name="register_button" value="Register" class="btn btn-primary"></td>
			</tr>
		</table>
	</form>
</div>
</div>