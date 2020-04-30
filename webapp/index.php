<?php
#ini_set('display_startup_errors', true);
#error_reporting(E_ALL);
#ini_set('display_errors', true);


//If logged in then user goes to home page else they go to login pagek

define('DB_SERVER', '192.168.0.40');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'password');
define('DB_NAME', 'webapp');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
session_start();

if(!isset($_SESSION['username'])){

	$_SESSION['msg'] = "you must log in first to view this page";
	echo $_SESSION['msg'];
	
}

if(isset($_GET['logout'])){
	session_unset();
	session_destroy();
	unset($_SESSION['username']);
	header("location: login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<title>HOME PAGE</title>
</head>
<body>
  <div class="main">
	<h1>This is the homepage</h1>
	<?php
	if(isset($_SESSION['success'])) : ?>

	<div>
		<h3> 
			<?php
			echo $_SESSION['success'];
			unset($_SESSION['success']);
			?>
		</h3>
	</div>
	<?php endif; ?>

<?php if(isset($_SESSION['username'])) : ?>

	<h3>Welcome <strong> <?php echo $_SESSION['username']; ?></strong></h3>
	<?php if ($_SESSION['admin']==1){ ?> 
		<a name="view_requests" href="view_requests.php">View Network Requests</a> <?php } ?>

	<?php if ($_SESSION['admin']==0){
	$username=$_SESSION['username'];
	$sel_query="SELECT * FROM Users WHERE username = '$username' AND accepted = 1;";
	$result = mysqli_query($link, $sel_query);
	$row = mysqli_fetch_assoc($result);
	if($row['accepted']) {?>
	  <p>Congratulations! You are now a member of the network</p>

	<?php 
	}
	else {
	 ?> 
		<div>
		<table>
		<form action="net_request.php" method="post">
		<tr><td><strong>Request Network Account:</strong></td></tr>
		<tr><td>
		Password:</td><td><input type="password" name=pass></input></td></tr>
		<tr><td colspan=2>
		<center>
		<input type=submit value=submit>
		</center>
		</td>
		</tr>
		</table>
		
		</div>

<?php }}?>
	<div>
	<a href="index.php?logout=1">Logout     </a>	<a href="reset_password.php">Reset Password</a>
	</div>
<?php endif; ?>
  </div>
</body>

</body>
</html>






