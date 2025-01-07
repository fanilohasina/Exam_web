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

// Middlewares
$authMiddleware = new AuthMiddleware();

// Auth here
$authController = new AuthController($app);

$router->get('/login', [ $authController, 'login' ]);
$router->post('/login', [ $authController, 'dologin' ]);

$router->get('/inscription', [ $authController, 'register' ]);
$router->post('/inscription', [$authController, 'doregister']);

$welcomeController = new WelcomeController();
$router->get('/', [ $welcomeController, 'home' ])->addMiddleware([$authMiddleware, 'user']); 

// Recharge here
$transactionController = new TransactionController($app);
$router->get('/recharge', [$transactionController, 'recharge'])->addMiddleware([$authMiddleware, 'user']);
$router->post('/recharge', [$transactionController, 'dorecharge'])->addMiddleware([$authMiddleware, 'user']);

// Cadeau here
$cadeauController = new CadeauController($app);
$router->get('/cadeau', [$cadeauController, 'cadeau'])->addMiddleware([$authMiddleware, 'user']);
$router->get('/docadeau', [$cadeauController, 'docadeau'])->addMiddleware([$authMiddleware, 'user']);

// $router->post('/buy-cadeau', fn() => var_dump($_POST))->addMiddleware([$authMiddleware, 'user']);

