<?php

session_start();

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';


/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
//1. hoe je het pad noemt in de url
//2. controller
//3. hoe je het bestand/class noemt in de map controller
//4. action
//5. hoe je de action hebt genoemd in de controller

//Login
$router->add('', ['controller' => 'Login', 'action' => 'login']);

//Dashboard
$router->add('dashboard', ['controller' => 'Home', 'action' => 'index']);

$router->dispatch($_SERVER['QUERY_STRING']);
