<?php

declare(strict_types=1);

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

return fn (DependencyFactory $dependencyFactory) => [
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
