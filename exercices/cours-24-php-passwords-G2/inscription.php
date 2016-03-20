<?php 

	include 'includes/config.php';

	if(!empty($_POST))
	{
		$email    = $_POST['email'];
		$password = hash('sha256',SALT.$_POST['password']);

		$prepare = $pdo->prepare('INSERT INTO users (email,password) VALUES (:email,:password)');
		$prepare->bindValue('email',$email);
		$prepare->bindValue('password',$password);
		$execute = $prepare->execute();
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
			<input type="email" name="email" placeholder="Email">
		</div>
		<div>
			<input type="password" name="password" placeholder="Password">
		</div>
		<div>
			<input type="submit">
		</div>
	</form>
</body>
</html>