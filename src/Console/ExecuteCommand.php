<?php
declare(strict_types=1);

namespace Migraine\Console;

use Migraine\Configuration\YamlParser;
use Migraine\Exception\StorageException;
use Migraine\Exception\TaskException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
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
        $config = new YamlParser(file_get_contents($input->getOption('config')));
        $migraine = $config->parse()->getMigraine();

        if (false === $migraine->supports($config->getRequiredVersion())) {
            $output->writeln('<error>Your migraine version is not supported for this configuration<error>');
            return Command::FAILURE;
        }

        $migraine->execute($input->getArgument('task'));

        return Command::SUCCESS;
    }
}
