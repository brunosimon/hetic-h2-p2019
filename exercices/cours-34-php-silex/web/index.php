<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;

// Route 1
$app->get('/hello/{name}', function($name) {
    return 'Route 1';
});

// Route 2
$app->get('/hello/tata', function() {
    return 'Route 2';
});

$app->run();
