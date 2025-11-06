<?php

declare(strict_types=1);

use App\Controllers\HomeController;
use Dotenv\Dotenv;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require __DIR__ . '/../vendor/autoload.php';

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$app = AppFactory::create();

$app->get('/', [HomeController::class, 'index']);

$twig = Twig::create(VIEW_PATH, [
    'cache'       => STORAGE_PATH . '/cache',
    'auto_reload' => true,
]);

$app->add(TwigMiddleware::create($app, $twig));
$app->run();
