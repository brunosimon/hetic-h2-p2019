<?php 

	// // Curl
	// $curl = curl_init();
	// curl_setopt($curl, CURLOPT_URL, 'http://api.openweathermap.org/data/2.5/weather?q=Paris&APPID=9e8150c9d6fbf87d678d2cf7f7a2c00a');
	// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	// $result = curl_exec($curl);
	// curl_close($curl);

	// $result = json_decode($result);

	// File get contents
	$result = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Paris&APPID=9e8150c9d6fbf87d678d2cf7f7a2c00a');
	$result = json_decode($result);

	echo '<pre>';
	print_r($result->weather[0]->description);
	echo '</pre>';
	exit;

?><!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
		<title>Template 03</title>
		<link rel="stylesheet" href="src/css/reset.css">
		<link rel="stylesheet" href="src/css/style.css">
	</head>
	<body>
		<?= 'Hello World' ?>

		<script src="src/js/libs/jquery-2.2.0.js"></script>
		<script src="src/js/app/script.js"></script>
	</body>
</html>