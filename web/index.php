<?php

require '../vendor/autoload.php';

// Set root path
Ares\Config::$root = dirname(__DIR__);

// Set controller extension, front/back/other
Ares\Config::$ctlr_ext = "Front";

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