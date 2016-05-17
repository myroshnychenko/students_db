<?php

namespace AppBundle\Command;

use AppBundle\Service\StudentGeneratePathService;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StudentGeneratePathCommand extends ContainerAwareCommand
{
    const COMMAND_NAME = 'students:generate:path';

    /**
     * @param StudentGeneratePathService $studentGeneratePathService
     */
    public function __construct(StudentGeneratePathService $studentGeneratePathService)
    {
        parent::__construct();
        $this->studentGeneratePathService = $studentGeneratePathService;
    }

    protected function configure()
    {
        $this
            ->setName(self::COMMAND_NAME)
            ->setDescription('Generate student\'s unique path');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $s = microtime(true);
        $output->writeln('Command ' . self::COMMAND_NAME , 'is run');
        $output->writeln("Memory usage before: " . (memory_get_usage() / 1024) . " KB" . PHP_EOL);

        $this->studentGeneratePathService->generate();

        $e = microtime(true);
        $output->writeln('Command ' . self::COMMAND_NAME , 'is finished');
        $output->writeln("Memory usage after: " . (memory_get_usage() / 1024) . " KB" . PHP_EOL);
        $output->writeln("Processing was done in " . ($e - $s) . " seconds" . PHP_EOL);
    }
}