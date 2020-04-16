<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
</head>
<body>
	
	<div class="containter">
	
		<div class="header">

			<h2>Log In</h2>
		</div>
		<form action="login.php" method="post">
			
		<div>
			<label for="username">Username</label>
			<input  type="text" name="username" required>
		</div>


		<div>
			<label for="password">Password :</label>
			<input type="password" name="password" required> 
		</div>

		<button type="submit" name="login"> Log In </button>

		<p>Don't have an account?<a href="registration.php">Register Here</a></p>

		</form>

	</div>
</body>
</html>
