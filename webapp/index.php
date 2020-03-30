<?php
ini_set('display_startup_errors', true);
error_reporting(E_ALL);
ini_set('display_errors', true);


//If logged in then user goes to home page else they go to login pagek
session_start();

if(isset($_SESSION['username'])){

	$_SESSION['msg'] = "you must log in first to view this page";
	//header("location: login.php");
}

if(isset($_GET['logout'])){

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
	<h1>This is the homepage</h1>
	<?php
	if(isset($_SESSION['success'])) : ?>

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
	<?php if ($_SESSION['admin']==1){ ?> <button> View Network Requests</button> <?php  
	echo $_SESSION['admin']; }?>

	<?php if ($_SESSION['admin']==0){ ?> <button>Request Network Account</button> <?php }?>

	<button>Logout<a href="index.php?logout='1'"></a></button>

<?php endif; ?>

</body>

</body>
</html>








