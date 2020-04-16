<?php
ini_set('display_startup_errors', true);
error_reporting(E_ALL);
ini_set('display_errors', true);

include("server.php");
//If logged in then user goes to home page else they go to login pagek
//session_start();

if(!isset($_SESSION['username'])){

	$_SESSION['msg'] = "you must log in first to view this page";
	echo $_SESSION['msg'];
	
}
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
	<title>Network Requests</title>
</head>
<body>
  <h1>Pending Network Requests</h1>
   <form method="get">
    <table width=100% border="1" style=border-collapse:collagpse;">
      <thead>
        <tr>
	  <th><strong>Username</strong></th>
	  <th><strong>Email</strong></th>
	  <th><strong>Requested</strong></th>
	  <th><strong>Accept</strong></th>
	</tr>
      </thead>
      <tbody>

<!-- List all the users that have a request -->
	<?php
	$count = 1;
	$sel_query="SELECT * FROM Users WHERE request = 1 AND accepted = 0;";
	$result = mysqli_query($link, $sel_query);
	while($row = mysqli_fetch_assoc($result)) { ?>
	<tr><td align="center"><?php echo $row['username']; ?></td>
	<td align="center"><?php echo $row['email']; ?></td>
	<td align="center"><?php echo $row['request']; ?></td>
	<td align="center">
	<a href="accept_request.php?id=<?php echo $row['username']; ?>">Accept</a></td>
	</tr>
	<?php $count++; } ?>
      </tbody>
    </table>
   </form>

	<br>

	<div>
	  <a href="index.php">Back to Home Page</a>
	</div>

</body>

</body>
</html>








