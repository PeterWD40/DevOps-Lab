<?php # include('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<title>RESET PASSWORD</title>
</head>
<body>
	
	<div class="main">
	
		<div class="header">

			<h2>Reset Password</h2>
		</div>
		<form action="reset.php" method="post">

			<?php include('errors.php') ?>
			


			<input placeholder="Old Password" class="pass" type="password" name="oldpassword" required> 


			<input placeholder="New Password" class="pass" type="password" name="password" required> 


			<input placeholder="Confirm New Password" class="pass" type="password" name="password_2" required>


		<button class="submit" type="submit" name="reg_pass"> Submit </button>
 
		<p><a class="forgot" href="index.php">Back to Home Page</a></p>

		</form>

	</div>
</body>
</html>
