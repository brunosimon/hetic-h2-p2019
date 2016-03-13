<?php

// Connexion variables
define('DB_HOST','localhost');
define('DB_NAME','hetic_p2019_formulaire_G2');
define('DB_USER','root');
define('DB_PASS','root'); // '' par défaut sur windows

try
{
    // Try to connect to database
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);

    // Set fetch mode to object
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}
catch (Exception $e)
{
    // Failed to connect
    die('Could not connect');
}

// // Query
// $query = $pdo->query('SELECT * FROM users');
// $users = $query->fetchAll();

// // Exec
// $exec = $pdo->exec('DELETE FROM users WHERE id = 13');

// Prepare
$data = array(
	'name'   => 'Lorem',
	'age'    => 26,
	'gender' => 'male'
);
$prepare = $pdo->prepare('INSERT INTO users (name,age,gender) VALUES (:name,:age,:gender)');
$prepare->bindValue('name',$data['name']);
$prepare->bindValue('age',$data['age']);
$prepare->bindValue('gender',$data['gender']);
$execute = $prepare->execute();

echo '<pre>';
print_r($execute);
echo '</pre>';
exit;