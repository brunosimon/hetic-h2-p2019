<?php 

	include 'includes/config.php';

	if(!empty($_POST))
	{
		$email    = $_POST['email'];
		$password = hash('sha256',SALT.$_POST['password']);

		$prepare = $pdo->prepare('SELECT * FROM users WHERE email = :email');
		$prepare->bindValue('email',$email);
		$prepare->execute();
		$user = $prepare->fetch();

		if($user)
		{
			if($user->password == $password)
			{
				$_SESSION['user'] = array(
					'id'    => $user->id,
					'email' => $user->email
				);

				echo 'You shall pass';
			}
			else
			{
				echo 'You shall not pass !';
			}
		}
		else
		{
			echo 'utilisateur introuvable';
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

	<?php if(!empty($_SESSION['user'])): ?>

		<a href="disconnect.php">Disconnect</a>
		<div>Bonjour <?= $_SESSION['user']['email'] ?></div>

	<?php else: ?>

		<a href="inscription.php">Inscription</a>
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

	<?php endif; ?>
</body>
</html>