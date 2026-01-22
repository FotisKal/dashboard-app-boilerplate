<?php

declare(strict_types=1);

use App\Config;
use App\Controllers\HomeController;
use App\Controllers\SampleController;
use DI\Container;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Dotenv\Dotenv;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require __DIR__ . '/../vendor/autoload.php';

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$container = new Container();

$container->set(Config::class, fn() => new Config($_ENV));
$container->set(EntityManager::class, fn(Config $config) => new EntityManager(
    DriverManager::getConnection($config->db),
    ORMSetup::createAttributeMetadataConfiguration([__DIR__ . '/../app/Entity'])
));

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
