<?php
session_start();
//check if username is logging out
if(isset($_GET['action'])){
	if($_GET['action']=="adminlogout") {
		unset($_SESSION['admin']);
	}
}

// check if username and password match
$adminlogin_sql ="SELECT * FROM users WHERE username ='".$_POST['username']."' AND password ='".sha1($_POST['password'])."'";
if($adminlogin_query= mysqli_query($db, $adminlogin_sql)) {
	$adminlogin = mysqli_fetch_assoc($adminlogin_query);
   $_SESSION['admin'] = $adminlogin['username'];
}


if(isset($_SESSION['admin'])){
	include 'cpanel.php';
} else {
	include 'adminlogin.php';
}
?>