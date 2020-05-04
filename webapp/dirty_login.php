<?php include('dirty_server.php');
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
	


		<p class="sign" align="center">Vulnerable Login</p>

		<form class="form1" action="dirty_login.php" method="get">
			
		
	<!--		<label for="username">Username</label> -->
			<input placeholder="Username" class="un " type="text" name="username" >
		


		
	<!--		<label for="password">Password :</label> -->
			<input placeholder="Password" class="pass" type="password" name="password" > 
		

		<button class="submit" type="submit" name="dirty_login"> Log In </button>

		<p class="forgot">Don't have an account?<a class="forgot" name="registration" href="registration.php">Register Here</a></p>

		</form>

	</div>
</body>
</html>
