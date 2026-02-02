<?php

declare(strict_types=1);

namespace App\Commands;

use App\Services\SampleService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:sample-command', description: 'Sample command')]
class SampleCommand extends Command
{
    public function __construct(private readonly SampleService $service)
    {
        parent::__construct();
    }

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
        $count = count($this->service->getSamples());
        $output->write((string) $count, true);
        $output->write('sample command executed', true);

        return Command::SUCCESS;
    }
}
