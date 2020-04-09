<?php
#ini_set('display_startup_errors', true);
#error_reporting(E_ALL);
#ini_set('display_errors', true);


//If logged in then user goes to home page else they go to login pagek
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
	<title>HOME PAGE</title>
</head>
<body>
	
	<?php
	if(isset($_SESSION['success'])) : ?>
	<h1>This is the homepage</h1>
	<div
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
		<a href="view_requests.php">View Network Requests</a> <?php } ?>

	<?php if ($_SESSION['admin']==0){ ?> 
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

<?php }?>
	<div>
	<a href="index.php?logout=1">Logout</a>
	</div>
<?php endif; ?>

</body>

</body>
</html>






