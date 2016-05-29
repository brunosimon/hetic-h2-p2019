<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

// Config
$app['debug'] = true;

// Services
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

// Routes
$app->get('/toto/tata/tutu', function() use ($app)
{
	$data = array();

	return $app['twig']->render('example.twig',$data);
});

// Run
$app->run();