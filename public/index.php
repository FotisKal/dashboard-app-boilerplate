<?php

declare(strict_types=1);

use App\Controllers\HomeController;
use App\Controllers\SampleController;
use Dotenv\Dotenv;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../configs/path_constants.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$container = require __DIR__ . '/../configs/container.php';

AppFactory::setContainer($container);

$app = AppFactory::create();

$app->get('/', [HomeController::class, 'index']);
$app->get('/sample', [SampleController::class, 'index']);

$twig = Twig::create(VIEW_PATH, [
    'cache'       => STORAGE_PATH . '/cache',
    'auto_reload' => true,
]);

$app->add(TwigMiddleware::create($app, $twig));
$app->run();
