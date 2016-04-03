<?php 

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, 'http://api.openweathermap.org/data/2.5/weather?q=Paris&APPID=9e8150c9d6fbf87d678d2cf7f7a2c00a');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($curl);
	curl_close($curl);

	$result = json_decode($result);

	echo '<pre>';
	print_r($result->weather[0]->description);
	echo '</pre>';
	exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>API</title>
</head>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script>
				
		// // Instanciate request
		// var xhr = new XMLHttpRequest();

		// // Ready stage change callback
		// xhr.onreadystatechange = function()
		// {
		//     // Is done
		//     if( xhr.readyState === XMLHttpRequest.DONE )
		//     {
		//         // Success
		//         if(xhr.status === 200)
		//         {
		//             var result = JSON.parse( xhr.responseText );
		//             console.log( 'success' );
		//             console.log( result );
		//         }
		//         else
		//         {
		//             console.log( 'error' );
		//         }
		//     }
		// };

		// // Open request
		// xhr.open( 'GET', 'http://api.openweathermap.org/data/2.5/weather?q=Paris&APPID=9e8150c9d6fbf87d678d2cf7f7a2c00a', true );

		// // Send request
		// xhr.send();

		// $.getJSON(
		//     'http://api.openweathermap.org/data/2.5/weather?q=Paris&APPID=9e8150c9d6fbf87d678d2cf7f7a2c00a',
		//     function( data )
		//     {
		//         console.log(data);
		//     }
		// );
		                    
	</script>
</body>
</html>