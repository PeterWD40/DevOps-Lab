<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<title>REGISTRATION</title>
</head>
<body>
	
	<div class="main">
	


		<p class="sign" align="center">Register</p>

		<form class="form1" action="registration.php" method="post">

			<?php include('errors.php') ?>
			

			
			<input placeholder="Username" class="un" type="text" name="username" required>
			<input placeholder="Email@email.com" class="un " type="email" name="email" required>





			<input placeholder="password" class="pass" type="password" name="password" required> 

			<input placeholder="Confirm Password" class="pass" type="password" name="password_2" required>


		<div>
			<label for="admin">Admin :</label>
			<input type="checkbox" name="admin">
		</div>

		<button class="submit" type="submit" name="reg_usr"> Submit </button>

		<p class="forgot">Already a user? <a class="forgot" href="login.php">Log in</a></p>

		</form>

	</div>
</body>
</html>
