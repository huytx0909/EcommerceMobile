<?php 
session_start();
session_destroy();
unset($_SESSION['username']);
$SESSION['message'] = "Logged out";
header("location: index.php?page=login");
 ?>