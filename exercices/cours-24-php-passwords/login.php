<?php 

	include 'includes/config.php';

	// Form sent
	if(!empty($_POST))
	{
		// Retrieve inputs
		$email    = $_POST['email'];
		$password = hash('sha256',SALT.$_POST['password']); // Hash + Salt

		// SQL query
		$prepare = $pdo->prepare( 'SELECT * FROM users WHERE email = :email LIMIT 1' );
		$prepare->bindValue('email',$email);
		$prepare->execute();
		$user = $prepare->fetch();

		// Test password
		if($user->password == $password)
			echo 'You shall pass !';
		else
			echo 'You shall not pass !';
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<h1>Login</h1>
	<a href="inscription.php">Inscription</a>
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