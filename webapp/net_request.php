<?php

 //for testing errors:
ini_set('display_startup_errors', true);
error_reporting(E_ALL);
ini_set('display_errors', true);

session_start();

define('DB_SERVER', '192.168.0.34');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'webapp');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_SESSION['username'])) $username = $_SESSION['username'];
//get the row with this username and save the corresponding password.
$sel_query =  "SELECT * FROM Users WHERE username = '$username'";
$result = mysqli_query($link, $sel_query);
$row = mysqli_fetch_assoc($result);
$password = $row['password'];

//if the password entered matches the password in the database then create a request
if (md5($_POST['pass']) == $password){		
	$sel_query =  "UPDATE Users SET request = 1 WHERE username = '$username'";
	if($sel_query) echo "\n Your request has been sent to a network administrator";
	echo "<br>" ;
	$result = mysqli_query($link, $sel_query);
}
//else header('Location: index.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sending Requests</title>
</head>
<body>
  <a href="index.php">Back to Home Page</a>
</body>
</html>
