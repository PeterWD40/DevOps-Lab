<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>REGISTRATION</title>
</head>
<body>
	
	<div class="containter">
	
		<div class="header">

			<h2>Register</h2>
		</div>
		<form action="registration.php" method="post">

			<?php include('errors.php') ?>
			
		<div>
			<label for="username">Username</label>
			<input type="text" name="username" required>
		</div>

		<div>
			<label for="email">Email :</label>
			<input type="email" name="email" required>

		</div>

		<div>
			<label for="password">Password :</label>
			<input type="password" name="password" required> 
		</div>

		<div>
			<label for="password">Confirm Password :</label>
			<input type="password" name="password_2" required>
		</div>

		<div>
			<label for="admin">Admin :</label>
			<input type="checkbox" name="admin">
		</div>

		<button type="submit" name="reg_usr"> Submit </button>

		<p>Already a user<a href="login.php">Log in</a></p>

		</form>

	</div>
</body>
</html>
