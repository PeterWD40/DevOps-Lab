<?php include('server.php');
      include('errors.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<title>Log In</title>
</head>
<body>
	
	<div class="main">
	


		<p class="sign" align="center">new Title for login</p>

		<form class="form1" action="login.php" method="post">
			
		
	<!--		<label for="username">Username</label> -->
			<input placeholder="Username" class="un " type="text" name="username" required>
		


		
	<!--		<label for="password">Password :</label> -->
			<input placeholder="Password" class="pass" type="password" name="password" required> 
		

		<button class="submit" type="submit" name="login"> Log In </button>

		<p class="forgot">Don't have an account?<a class="forgot" name="registration" href="registration.php">Register Here</a></p>

		</form>

	</div>
</body>
</html>
