<?php
declare(strict_types=1);

namespace Migraine\Console;

use Migraine\Configuration\YamlParser;
use Migraine\Exception\StorageException;
use Migraine\Exception\TaskException;
use Migraine\Migraine;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ExecuteCommand
 * @package Migraine\Console
 */
class ExecuteCommand extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'migraine:execute';

    /**
     * @inheritDoc
     */
    protected function configure()
    {
        $this->setDescription('Execute a task from a configuration file');
        $this->addArgument('task', InputArgument::OPTIONAL, 'Task name', 'default');
        $this->addOption('config', 'c', InputOption::VALUE_OPTIONAL, 'Configuration file', 'migraine.yml');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws StorageException
     * @throws TaskException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $logger = new ConsoleLogger($output);

        $file = getcwd() . '/' . $input->getOption('config');

        if (false === file_exists($file)) {
            $logger->error(sprintf('Cannot read the file: %s', $file));
            return Command::FAILURE;
        }

        $parser = new YamlParser(file_get_contents($file));
        $migraine = $parser->parse()->getMigraine();
        $configVersion = $parser->getRequiredVersion();

        if (false === Migraine::supports($configVersion)) {
            $logger->error(sprintf('This configuration is not supported (version: %s)', $configVersion));
            return Command::FAILURE;
        }

        $migraine->setLogger($logger);
        $migraine->execute($input->getArgument('task'));

        return Command::SUCCESS;
    }
}
