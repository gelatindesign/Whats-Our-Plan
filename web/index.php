<?php

require '../vendor/autoload.php';

Ares\Config::$root = dirname(__DIR__);

// Attempt to start the request
try {
	Ares\Request::start();

} catch (Exception $e) {
	echo $e->getMessage();
	exit;
	
}

// Attempt to find the url
try {
	Ares\Router::find();

} catch (Exception $e) {
	echo $e->getMessage();
	exit;
}