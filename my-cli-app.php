<?php

declare(strict_types=1);

use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Tools\Console\Command\{
    CurrentCommand,
    DiffCommand,
    DumpSchemaCommand,
    ExecuteCommand,
    GenerateCommand,
    LatestCommand,
    ListCommand,
    MigrateCommand,
    RollupCommand,
    StatusCommand,
    SyncMetadataCommand,
    UpToDateCommand,
    VersionCommand
};
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

// replace with path to your own project bootstrap file
$app       = require 'bootstrap.php';
$container = $app->getContainer();

// replace with mechanism to retrieve EntityManager in your app
$entityManager = $container->get(EntityManager::class);

$config            = new PhpFile(CONFIG_PATH . '/migrations.php');
$dependencyFactory = DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));

$commands = [
    // If you want to add your own custom console commands,
    // you can do so here.
    new CurrentCommand($dependencyFactory),
    new DumpSchemaCommand($dependencyFactory),
    new ExecuteCommand($dependencyFactory),
    new GenerateCommand($dependencyFactory),
    new LatestCommand($dependencyFactory),
    new MigrateCommand($dependencyFactory),
    new RollupCommand($dependencyFactory),
    new StatusCommand($dependencyFactory),
    new VersionCommand($dependencyFactory),
    new UpToDateCommand($dependencyFactory),
    new SyncMetadataCommand($dependencyFactory),
    new ListCommand($dependencyFactory),
    new DiffCommand($dependencyFactory),
];

ConsoleRunner::run(
    new SingleManagerProvider($entityManager),
    $commands
);
