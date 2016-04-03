<?php

// Config 
include 'config/options.php';
// include 'config/database.php'; // Uncomment if you need database

// Get the query
$q = empty($_GET['q']) ? '' : $_GET['q'];

// Routes
if($q == '')
	$page = 'home';
else if($q == 'about')
	$page = 'about';
else if($q == 'news')
	$page = 'news';
else if(preg_match('/^news\/[-a-z0-9]+$/',$q)) // news/mon-titre-d-actualite
	$page = 'news-single';
else
	$page = '404';

// Includes
include 'controllers/'.$page.'.php';
include 'views/partials/header.php';
include 'views/pages/'.$page.'.php';
include 'views/partials/footer.php';