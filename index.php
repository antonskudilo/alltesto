<?php
	namespace Core;

    define('ROOT', dirname(__FILE__));

	error_reporting(E_ALL);
	ini_set('display_errors', 'off');

    require_once (ROOT.'/project/components/Autoload.php');
    require_once ROOT . '/vendor/autoload.php';
//    require_once ROOT . '/vendor/twig/twig/lib/Twig/Autoloader.php';

	session_start();

	$routes = require ROOT . '/project/config/routes.php';

	$track = ( new Router )      -> getTrack($routes, $_SERVER['REQUEST_URI']);
	$page  = ( new Dispatcher )  -> getPage($track);

	echo (new View) -> render($page);
