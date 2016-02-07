<?php 

// Connexion variables
define('DB_HOST','localhost');
define('DB_NAME','hetic-p2019-first');
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
    die('Cound not connect');
}

// $exec = $pdo->exec('INSERT INTO users (name,age,gender) VALUES (\'bruno\',26,\'male\')');
// $exec = $pdo->exec('UPDATE users SET name = \'toto\' WHERE id = 2');



// Valeurs
$data = array('name'=>'Tommy','age'=>30,'gender'=>'male');

// Prépare la requête
$prepare = $pdo->prepare('INSERT INTO users (name,age,gender) VALUES (:name,:age,:gender)');

// Execute la requête
$exec = $prepare->execute();





// Préparation de la requête
$query = $pdo->query('SELECT * FROM users');

// Éxécution de la requête et récupération des données
$users = $query->fetchAll();

// Affichage des données
echo '<pre>';
print_r($users);
echo '</pre>';