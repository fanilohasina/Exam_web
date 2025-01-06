<?php

use app\controllers\ApiExampleController;
use app\controllers\AuthController;
use app\controllers\CadeauController;
use app\controllers\TransactionController;
use app\controllers\WelcomeController;
use app\middlewares\AuthMiddleware;
use flight\Engine;
use flight\net\Router;
// use Flight;

/** 
 * @var Router $router 
 * @var Engine $app
 */
/*$router->get('/', function() use ($app) {
	$Welcome_Controller = new WelcomeController($app);
	$app->render('welcome', [ 'message' => 'It works!!' ]);
});*/

// Middlewares
$authMiddleware = new AuthMiddleware();

$Welcome_Controller = new WelcomeController();

// Auth here
$authController = new AuthController($app);

$router->get('/login', [ $authController, 'login' ]);
$router->post('/login', [ $authController, 'dologin' ]);

$router->get('/inscription', [ $authController, 'register' ]);
$router->post('/inscription', [$authController, 'doregister']);

$router->get('/', [ $Welcome_Controller, 'home' ])->addMiddleware([$authMiddleware, 'user']); 
$router->get('/liste-cadeaux', [ $Welcome_Controller, 'list' ])->addMiddleware([$authMiddleware, 'user']); 

// Recharge here
$transactionController = new TransactionController($app);
$router->get('/recharge', [$transactionController, 'recharge'])->addMiddleware([$authMiddleware, 'user']);
$router->post('/recharge', [$transactionController, 'dorecharge'])->addMiddleware([$authMiddleware, 'user']);

// Cadeau here
$cadeauController = new CadeauController($app);
$router->get('/cadeau', [$cadeauController, 'cadeau'])->addMiddleware([$authMiddleware, 'user']);