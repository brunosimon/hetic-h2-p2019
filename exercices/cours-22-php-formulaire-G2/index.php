<?php 
	require 'includes/form.php';
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

		<form action="#" method="post">
			<div>
				<input type="text" name="name" id="name">
				<label for="name">Name</label>
			</div>
			<div>
				<input type="number" name="age" id="age">
				<label for="age">Age</label>
			</div>
			<div>
				<label>
					<input type="radio" name="gender" value="female">
					Female
				</label>
				<label>
					<input type="radio" name="gender" value="male">
					Male
				</label>
			</div>
			<div>
				<input type="submit">
			</div>
		</form>

		<script src="src/js/libs/jquery-2.2.0.js"></script>
		<script src="src/js/app/script.js"></script>
	</body>
</html>