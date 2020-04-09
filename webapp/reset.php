<?php

#for testing errors:
ini_set('display_startup_errors', true);
error_reporting(E_ALL);
ini_set('display_errors', true);

session_start();

require('password.php');

define('DB_SERVER', '192.168.0.40');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'password');
define('DB_NAME', 'webapp');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(!isset($_SESSION['username'])){

	$_SESSION['msg'] = "you must log in first to view this page";
	echo $_SESSION['msg'];
	
}


if(isset($_SESSION['username'])) $username = $_SESSION['username'];
//get the row with this username and save the corresponding password.
$sel_query =  "SELECT * FROM Users WHERE username = '$username'";
$result = mysqli_query($link, $sel_query);
$row = mysqli_fetch_assoc($result);
$hash = $row['password'];

#get post and check if passwords match
if(isset($_POST['reg_pass'])){
$password = mysqli_real_escape_string($link, $_POST['password']);
$password_2 = mysqli_real_escape_string($link, $_POST['password_2']);
  if($password != $password_2){ 
    echo "Passwords do not match";
  }

//if the password entered matches the password in the database then create a request
  else if (password_verify($_POST['oldpassword'], $hash)){
	$hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$sel_query =  "UPDATE Users SET password = '$hash' WHERE username = '$username'";
	if($sel_query) echo "\n Your password has been successfully changed";
	echo "<br>" ;
	$result = mysqli_query($link, $sel_query);
  }
//else header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Password Reset</title>
</head>
<body>
  <a href="index.php">Back to Home Page</a>
</body>
</html>
