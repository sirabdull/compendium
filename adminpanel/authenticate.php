<?php
define('DB_HOST', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "");
define('DB_NAME', "candidates");

/**
 * Get instance of DB object
 */
$conn =  mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = $_POST['username'];
	$passwd =$_POST['password'];
	$remember ='remember';

	
$result = mysqli_query($conn,"SELECT * FROM `admin_accounts` WHERE `user_name` = '$username' AND `password` = ' $passwd' ");
if(mysqli_num_rows($result)>0){
	$_SESSION['usser_logged_in'] == true; 
	
	header(" location:index.php");
	
}
else{
	$_SESSION['login_failure'] == 'login failed';
	header("location:login.php");
echo 'bbb';
}
	//Get DB instance.
}
?>