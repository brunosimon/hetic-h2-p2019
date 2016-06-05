<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints;

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../models/pokemons.class.php';
require_once __DIR__.'/../models/types.class.php';

$app = new Silex\Application();

// Config
$app['debug'] = true;

// Services
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\SwiftmailerServiceProvider(), array(
    'swiftmailer.options' => array(
        'host'       => 'smtp.gmail.com',
        'port'       => 465,
        'username'   => 'hetic.p2018.smtp@gmail.com',
        'password'   => 'heticp2018smtp',
        'encryption' => 'ssl',
        'auth_mode'  => 'login'
    )
));
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

// Middlewares
$app->before(function() use ($app)
{
    $app['twig']->addGlobal('title','Hetic Pokedex');
});

// Routes
$app->get('/', function() use ($app)
{
	$data = array();

	return $app['twig']->render('pages/home.twig',$data);
})
->bind('home');

$app->match('/about', function(Request $request) use ($app)
{
	// Create builder
	$form_builder = $app['form.factory']->createBuilder();

	// Set method and action
	$form_builder->setMethod('post');
	$form_builder->setAction($app['url_generator']->generate('about'));

	// Add input
	$form_builder->add(
	    'name',
	    'text',
	    array(
	        'label'       => 'Your name',
	        'trim'        => true,
	        'max_length'  => 50,
	        'required'    => true,
	        'constraints' => array(
	        	new Constraints\NotEqualTo(
				    array(
				        'value'   => 'fuck',
				        'message' => 'Be polite you shithead'
				    )
				)
        	)
	    )
	);
	$form_builder->add(
	    'email',
	    'email',
	    array(
	        'label'      => 'Your email',
	        'trim'       => true,
	        'max_length' => 50,
	        'required'   => true,
	    )
	);
	$form_builder->add(
	    'subject',
	    'choice',
	    array(
	        'label'       => 'Subject',
	        'required'    => true,
	        'empty_value' => 'Choose a subject',
	        // 'multiple' => true,
	        // 'expanded' => true,
	        'choices'     => array(
	            'Informations' => 'Informations',
	            'Proposition'  => 'Proposition',
	            'Other'        => 'Other',
	        )
	    )
	);
	$form_builder->add(
	    'message',
	    'textarea',
	    array(
	        'label'      => 'Message',
	        'trim'       => true,
	        'max_length' => 50,
	        'required'   => true,
	    )
	);
	$form_builder->add('submit','submit');

	// Create form
	$contact_form = $form_builder->getForm();

	// Handle request
	$contact_form->handleRequest($request);

	// Is submited
	if($contact_form->isSubmitted())
	{
		// Get form data
    	$form_data = $contact_form->getData();

    	// Is valid
    	if($contact_form->isValid())
    	{
    		$message = \Swift_Message::newInstance();
			$message->setSubject($form_data['subject'].' ('.$form_data['email'].')');
			$message->setFrom(array($form_data['email']));
			$message->setTo(array('bruno.simon@hetic.net'));
			$message->setBody($form_data['message']);

			$app['mailer']->send($message);

			return $app->redirect($app['url_generator']->generate('about'));
    	}
	}

	$data = array(
		'contact_form' => $contact_form->createView()
	);

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

$app->get('/test', function() use ($app)
{
    $url = $app['url_generator']->generate('pokemon',array('id'=>88));
    return $app->redirect($url);
});

// Error
$app->error(function (\Exception $e, $code) use ($app)
{
	if($app['debug'])
        return;

    $data = array(
        'title' => 'Error'
    );

    return $app['twig']->render('pages/error.twig',$data);
});

// Run
$app->run();