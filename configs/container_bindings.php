<?php

declare(strict_types=1);

use App\Config;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Slim\Views\Twig;

return [
    Config::class        => fn() => new Config($_ENV),
    EntityManager::class => fn(Config $config) => new EntityManager(
        DriverManager::getConnection($config->db),
        ORMSetup::createAttributeMetadataConfiguration([__DIR__ . '/../app/Entity'])
    ),
    Twig::class          => Twig::create(VIEW_PATH, [
        'cache'       => STORAGE_PATH . '/cache',
        'auto_reload' => true,
    ]),
];
