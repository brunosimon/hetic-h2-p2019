<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../models/pokemons.class.php';

$app = new Silex\Application();

// Config
$app['debug'] = true;

// Services
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array (
        'driver'    => 'pdo_mysql',
        'host'      => 'localhost',
        'dbname'    => 'hetic_p2019_silex_pokedex_g2',
        'user'      => 'root',
        'password'  => 'root',
        'charset'   => 'utf8'
    ),
));
$app['db']->setFetchMode(PDO::FETCH_OBJ);

// Models
$pokemonsModel = new PokemonsModel($app['db']);

// Routes
$app->get('/', function() use ($app)
{
	$data = array();

	return $app['twig']->render('pages/home.twig',$data);
})
->bind('home');

$app->get('/about', function() use ($app)
{
	$data = array();

	return $app['twig']->render('pages/about.twig',$data);
})
->bind('about');

$app->get('/pokemons', function() use ($app,$pokemonsModel)
{
	$pokemons = $pokemonsModel->getAll();

	$data = array(
		'pokemons' => $pokemons
	);

	return $app['twig']->render('pages/pokemons.twig',$data);
})
->bind('pokemons');

$app->get('/pokemon/{id}', function($id) use ($app)
{
	$data = array();

	return $app['twig']->render('pages/pokemon.twig',$data);
})
->assert('id','\d+')
->bind('pokemon');

// Run
$app->run();