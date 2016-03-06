<?php 

	include 'includes/config.php';

	// Form sent
	if(!empty($_POST))
	{
		// Retrieve inputs
		$email    = $_POST['email'];
		$password = hash('sha256',SALT.$_POST['password']); // Hash + Salt

		// SQL query
		$prepare = $pdo->prepare( 'INSERT INTO users (email,password) VALUES (:email,:password)' );
		$prepare->bindValue('email',$email);
		$prepare->bindValue('password',$password);
		$prepare->execute();
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
</head>
<body>
	<h1>Inscription</h1>
	<a href="login.php">Login</a>
	<form action="#" method="post">
		<div>
			<input type="text" id="email" name="email">
			<label for="email">Email</label>
		</div>
		<div>
			<input type="password" id="password" name="password">
			<label for="password">Password</label>
		</div>
		<div>
			<input type="submit">
		</div>
	</form>
</body>
</html>