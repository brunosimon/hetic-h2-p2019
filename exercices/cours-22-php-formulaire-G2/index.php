<?php 
	require 'includes/config.php';
	require 'includes/form.php';

	$query = $pdo->query('SELECT * FROM users');
	$users = $query->fetchAll();

?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
		<title>Template 03</title>
		<!-- <link rel="stylesheet" href="src/css/reset.css"> -->
		<link rel="stylesheet" href="src/css/style.css">
	</head>
	<body>

		<?php if(!empty($errors)): ?>
			<div class="errors">
				<?php foreach($errors as $_error): ?>
					<div><?= $_error ?></div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php if(!empty($success)): ?>
			<div class="success">
				<?php foreach($success as $_success): ?>
					<div><?= $_success ?></div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<form action="#" method="post">
			<div class="<?= array_key_exists('name', $errors) ? 'error' : '' ?>">
				<input type="text" name="name" id="name" value="<?= $name ?>">
				<label for="name">Name</label>
			</div>
			<div class="<?= array_key_exists('age', $errors) ? 'error' : '' ?>">
				<input type="number" name="age" id="age" value="<?= $age ?>">
				<label for="age">Age</label>
			</div>
			<div class="<?= array_key_exists('gender', $errors) ? 'error' : '' ?>">
				<label>
					<input type="radio" name="gender" value="female" <?= $gender == 'female' ? 'checked' : '' ?> >
					Female
				</label>
				<label>
					<input type="radio" name="gender" value="male" <?= $gender == 'male' ? 'checked' : '' ?> >
					Male
				</label>
			</div>
			<div>
				<input type="submit">
			</div>
		</form>

		<table>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Age</th>
				<th>Gender</th>
			</tr>

			<?php foreach($users as $_user): ?>
				<tr>
					<td><?= $_user->id ?></td>
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