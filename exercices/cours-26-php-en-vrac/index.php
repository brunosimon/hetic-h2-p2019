<?php

// $to      = 'bruno.simon@hetic.net';
// $subject = 'Subject';
// $message = 'Hello !';
// $headers = 'MIME-Version:1.0'."\r\n".
//            'From:server@domain.com'."\r\n";

// mail($to,$subject,$message,$headers);

// header('HTTP/1.0 404 Not Found');
// die('ok');

// $ch = curl_init();
// curl_setopt($ch,CURLOPT_URL,'http://www.google.com/');
// curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
// curl_exec($ch);
// curl_close($ch);

// echo __LINE__; // Ligne
// echo '<br>';
// echo __FILE__; // Fichier
// echo '<br>';
// echo __DIR__;  // Dossier du fichier

// function ma_fonction()
// {
//     echo '<br>';
//     echo __FUNCTION__; // Fonction courante
// }

// ma_fonction();

// class Ma_Class
// {
//     public function __construct()
//     {
//     	echo '<br>';
//         echo __CLASS__; // Class courante
//     }
// }

// $class = new Ma_Class();


// echo dirname(__FILE__);
// $dir   = dirname(__FILE__);
// $files = glob($dir.'/*');

// $path = 'monfichier.txt';
// file_put_contents($path,"\ntest 1234",FILE_APPEND);

// $path    = 'monfichier.txt';
// $content = file_get_contents($path);

// $path = 'monfichier.txt';

// if(file_exists($path))
//     echo 'le fichier existe';
// else
//     echo 'le fichier n\'existe pas';

// echo max(1,2,999,3,10);
// echo min(1,2,999,3,10);
// echo rand(0,10);

// $user = array(
// 	'name'  => 'Toto',
// 	'age'   => 26,
// 	'admin' => false
// );

// $user_json = json_encode($user); // {"name":"Toto","age":26,"admin":false}

phpinfo();