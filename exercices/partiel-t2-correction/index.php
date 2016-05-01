<?php

// Config 
include 'config/options.php';
include 'config/database.php'; // Uncomment if you need database

// Get the query
$q = empty($_GET['q']) ? '' : $_GET['q'];

// Routes
if($q == '')
	$page = 'home';
else if($q == 'add')
	$page = 'add';

// Includes
include 'controllers/'.$page.'.php';
include 'views/partials/header.php';
include 'views/pages/'.$page.'.php';
include 'views/partials/footer.php';