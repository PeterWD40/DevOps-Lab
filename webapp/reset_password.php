<?php # include('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>RESET PASSWORD</title>
</head>
<body>
	
	<div class="containter">
	
		<div class="header">

			<h2>Reset Password</h2>
		</div>
		<form action="reset.php" method="post">

			<?php include('errors.php') ?>
			
		<div>
			<label for="password">Old Password :</label>
			<input type="password" name="oldpassword" required> 
		</div>

		<div>
			<label for="password">New Password :</label>
			<input type="password" name="password" required> 
		</div>

		<div>
			<label for="password">Confirm New Password :</label>
			<input type="password" name="password_2" required>
		</div>

		<button type="submit" name="reg_pass"> Submit </button>

		<p><a href="index.php">Back to Home Page</a></p>

		</form>

	</div>
</body>
</html>
