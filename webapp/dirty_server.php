<?php
 //for testing errors:
ini_set('display_startup_errors', true);
error_reporting(E_ALL);
ini_set('display_errors', true);

require('password.php');

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
session_start();

$username="";
$email="";

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
//else echo "Connected to SQL Server";

$errors = array();

//Register users
if (isset($_POST['reg_usr'])){
$username = mysqli_real_escape_string($link, $_POST['username']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$password = mysqli_real_escape_string($link, $_POST['password']);
$password_2 = mysqli_real_escape_string($link, $_POST['password_2']);
	if(isset($_POST['admin'])){
		$admin = 1;}
	else $admin = 0;


//form validation

if(empty($username)) array_push($errors, "Username is required, empty username");
if(empty($email)) array_push($errors, "Email is required, empty email");
if(empty($password)) array_push($errors, "Password is required, empty password");
if($password != $password_2)array_push($errors, "Passwords do not match");


//check db for existing username

$user_check_query = "SELECT * FROM Users WHERE username = '$username' or email = '$email' LIMIT 1";
$results = mysqli_query($link, $user_check_query);
$user = mysqli_fetch_assoc($results);

if($user) {
	
	if($user['username'] === $username){array_push($errors, "Username already exists");}
	if($user['email'] === $email){array_push($errors, "Email already exists");}
}
//Register user if no error
if(count($errors) == 0 ){
#	$password = md5($password); //encrypt password
	//print $password;


#SALTY PASSWORDS----------------------------------------------------------------------------------
	$hash = password_hash($password, PASSWORD_BCRYPT);
#---------------------------------------------------------------------------------------------------	
	

	$query = "INSERT INTO Users (username, email, password, admin) 
		VALUES ('$username', '$email', '$hash', '$admin')";
	mysqli_query($link, $query);
	$_SESSION['username'] = $username;
	$_SESSION['success'] = "You are now logged in";
	$_SESSION['admin'] = $admin;
	header("location: index.php");
}
}

//LOGIN USER:

if(isset($_POST['dirty_login'])) {
	//echo "got the login information successfully";
	//print_r($_POST);
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(empty($username)){
		array_push($errors, "Username is required");
	}
	if(empty($password)){
		array_push($errors, "Password is required");
	}

	if(count($errors) == 0 ) {
#CHANGES MADE FOR SALTED PASSWORDS HERE:---------------------------------------------------------
	#$password = md5($password);
	#$query = "SELECT * FROM Users WHERE username ='$username' AND password='$password'";
	$query = "SELECT * FROM Users WHERE username ='$username'";
	$results = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($results);
	//	echo "\n there are no errors so far and a query has been sent";
	if(mysqli_num_rows($results)){ 
	//	echo "\n the sql server has found your login";
	//	print_r($_SESSION);
		$hash = $row['password'];
		if (password_verify($password, $hash)){
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "Logged in successfully";
		$_SESSION['admin'] = $row['admin'];
		//if($row['admin']) echo 'YOU ARE AN ADMIN';

		header("location: index.php");}
	}else{
		echo "\n the wrong username and password combination has been pushed";
		array_push($errors, "Wrong username/password combination. Please try again.");
	//print_r($errors);
	$fp = fopen('./web_errors.log','w');
	fwrite($fp, print_r($errors,TRUE));
	fclose($fp);	
	}
		
}
}
//echo "\n everything compiled it seems";
?>
