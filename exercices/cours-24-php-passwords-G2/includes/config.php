<?php

// Session
session_start();

// Password
define('SALT','7§dèe§mbpk;/pd71');

// Connexion variables
define('DB_HOST','localhost');
define('DB_NAME','hetic_p2019_password_g2');
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
