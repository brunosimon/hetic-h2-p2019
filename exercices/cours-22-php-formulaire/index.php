<?php 
	include 'includes/config.php';
	include 'includes/form.php';

	$query = $pdo->query('SELECT * FROM users');
	$users = $query->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
		<title>Formulaire</title>
		<!-- <link rel="stylesheet" href="src/css/reset.css"> -->
		<link rel="stylesheet" href="src/css/style.css">
	</head>
	<body>

		<?php if(!empty($errors)): ?>
			<div class="errors">
				<?php foreach($errors as $_message): ?>
					<p><?= $_message ?></p>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php if(!empty($success)): ?>
			<div class="success">
				<?php foreach($success as $_message): ?>
					<p><?= $_message ?></p>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<form action="#" method="POST">
			<div class="<?= array_key_exists('name', $errors) ? 'error' : '' ?>">
				<input type="text" name="name" id="name" placeholder="Tommy" value="<?= $_POST['name'] ?>">
				<label for="name">Name</label>
			</div>
			<div class="<?= array_key_exists('age', $errors) ? 'error' : '' ?>">
				<input type="number" name="age" id="age" placeholder="20" value="<?= $_POST['age'] ?>">
				<label for="age">Age</label>
			</div>
			<div class="<?= array_key_exists('gender', $errors) ? 'error' : '' ?>">
				<label>
					<input type="radio" name="gender" value="female" <?= $_POST['gender'] == 'female' ? 'checked' : '' ?>> Female
				</label>
				<label>
					<input type="radio" name="gender" value="male" <?= $_POST['gender'] == 'male' ? 'checked' : '' ?>> Male
				</label>
			</div>
			<div>
				<input type="submit">
			</div>
		</form>

		<table>
			<tr>
				<th>Name</th>
				<th>Age</th>
				<th>Gender</th>
			</tr>
			<?php foreach($users as $_user): ?>
				<tr>
					<td><?= $_user->name ?></td>
					<td><?= $_user->age ?></td>
					<td><?= $_user->gender ?></td>
				</tr>
			<?php endforeach; ?>
		</table>

		<script src="src/js/libs/jquery-2.2.0.js"></script>
		<script src="src/js/app/script.js"></script>
	</body>
</html>