<?php

// setcookie('name','value',time() - 10,'/');

// echo '<pre>';
// print_r($_COOKIE);
// echo '</pre>';
// exit;

session_start();

// $_SESSION['user'] = array(
// 	'email' => 'toto@tata.com',
// 	'admin' => true
// );

echo '<pre>';
print_r($_SESSION);
echo '</pre>';
exit;

session_destroy();