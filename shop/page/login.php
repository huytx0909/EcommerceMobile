<?php



if (isset($_POST['login_button'])) {
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	$password = md5($password); // hash password to match.
	$sql = " SELECT * FROM users WHERE full_name = '$username' AND password = '$password' ";
	$result = mysqli_query($db, $sql);

	
	if (mysqli_num_rows($result) == 1) { 
		$_SESSION['message'] = "Logged in!";	
		$_SESSION['username'] = $username;
		if($_SESSION['username'] == "admin"){
			header("location: admin.php");
		} else {
		header("location: index.php?page=home");
		} //redirect to home page
	} else {
		 $_SESSION['message'] = "Incorrect password or username";
	}
}

 ?>
<div class="row">
<div class="col-md-4"></div>
<div calss="col-md-4">

<div class="header" align="center"> 
	<h1> Log in </h1>
</div>

<?php 
if (isset($_SESSION['message'])) {
 	echo "<div id = 'error_msg'>".$_SESSION['message']."</div>";
 	unset($_SESSION['message']);
 } ?>
<div class = "content">
<form method="POST" action="index.php?page=login" class="beta-form-checkout">
	<table>
		 <div class="form-group">
		<tr>
			<td>Username: </td>
			<td><input type="text" name="username" class="form-control" required></td>
		</tr>
	    </div>

		 <div class="form-group">
		<tr>
			<td>Password: </td>
			<td><input type="password" name="password" class="form-control" required></td>
		</tr>
	   </div>

		<tr>
			<td></td>
			<td><input type="submit" name="login_button" value="Log in" class="btn btn-primary"></td>
		</tr>
	</table>
</form>
</div>
</div>
</div>


