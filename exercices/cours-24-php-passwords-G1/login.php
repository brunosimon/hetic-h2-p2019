<?php 

	include 'includes/config.php';

	if(!empty($_POST))
	{
		$email    = $_POST['email'];
		$password = hash('sha256',SALT.$_POST['password']);

		$prepare = $pdo->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
		$prepare->bindValue('email',$email);
		$execute = $prepare->execute();
		$user    = $prepare->fetch();

		if($user)
		{
			if($user->password == $password)
			{
				echo 'You shall pass !';
			}
			else
			{
				echo 'You shall not pass !';
			}
		}
		else
		{
			echo 'Login ou mot de passe incorrect';
		}
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
	<form action="#" method="POST">
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