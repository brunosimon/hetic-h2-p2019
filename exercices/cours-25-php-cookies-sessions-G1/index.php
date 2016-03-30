<?php

session_start();

$_SESSION['name-1'] = 'value';
$_SESSION['name-2'] = array('toto','tata');

$object = new stdClass();
$object->foo = 'bar';
$_SESSION['name-3'] = $object;

session_destroy();