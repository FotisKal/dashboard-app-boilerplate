<?php

declare(strict_types=1);

namespace App\Commands;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:sample-command', description: 'Sample command')]
class SampleCommand extends Command
{
    public function initialize(InputInterface $input, OutputInterface $output): void
    {
        // ...
    }

    public function interact(InputInterface $input, OutputInterface $output): void
    {
        // ...
    }

    public function __invoke(OutputInterface $output): int
    {
        $output->write('sample command executed', true);

        return Command::SUCCESS;
    }
}
