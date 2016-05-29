<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../models/pokemons.class.php';
require_once __DIR__.'/../models/types.class.php';

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
        'dbname'    => 'hetic_p2019_silex_pokedex',
        'user'      => 'root',
        'password'  => 'root',
        'charset'   => 'utf8'
    ),
));
$app['db']->setFetchMode(PDO::FETCH_OBJ);

// Models
$pokemons_model = new PokemonsModel($app['db']);
$types_model    = new TypesModel($app['db']);

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

$app->get('/pokemons', function() use ($app,$pokemons_model)
{
	$pokemons = $pokemons_model->getAll();
	
	$data = array(
		'pokemons' => $pokemons
	);

	return $app['twig']->render('pages/pokemons.twig',$data);
})
->bind('pokemons');

$app->get('/pokemon/{id}', function($id) use ($app,$pokemons_model,$types_model)
{
	$pokemon        = $pokemons_model->getOneById($id);
	$pokemon->types = $types_model->getAllForPokemonId($pokemon->id);
	
	$data = array(
		'pokemon' => $pokemon
	);

	return $app['twig']->render('pages/pokemon.twig',$data);
})
->bind('pokemon');

// Run
$app->run();