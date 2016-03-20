<?php

	// Config
	include 'config/config.php';

	// Routing
	$q = !empty($_GET['q']) ? $_GET['q'] : '';
	
	if($q === 'home')
	{
		$page = 'home';
	}
	else if($q === 'contact')
	{
		$page = 'contact';
	}
	else if(preg_match('/^news\/\d+$/', $q))
	{
		$page = 'news-single';
	}
	else
	{
		$page = '404';
	}

	// Includes
	ob_start();
	include 'views/pages/'.$page.'.php';
	$page_content = ob_get_clean();

	include 'views/partials/header.php';
	echo $page_content;
	include 'views/partials/footer.php';

