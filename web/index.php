<?php

require '../vendor/autoload.php';

Ares\Config::$root = dirname(__DIR__);

try {
	Ares\Request::start();

} catch (Exception $e) {
	echo $e->getMessage();
	exit;
}

Ares\Router::find();