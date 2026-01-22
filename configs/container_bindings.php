<?php

declare(strict_types=1);

use App\Config;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

return [
    Config::class        => fn() => new Config($_ENV),
    EntityManager::class => fn(Config $config) => new EntityManager(
        DriverManager::getConnection($config->db),
        ORMSetup::createAttributeMetadataConfiguration([__DIR__ . '/../app/Entity'])
    ),
];
