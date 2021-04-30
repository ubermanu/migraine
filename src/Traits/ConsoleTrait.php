<?php
declare(strict_types=1);

namespace Migraine\Traits;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Trait ConsoleTrait
 * @package Migraine\Traits
 */
trait ConsoleTrait
{
    /**
     * @var InputInterface
     */
    protected static InputInterface $input;

    /**
     * @var OutputInterface
     */
    protected static OutputInterface $output;

    /**
     * TODO: Find an alternative solution other than static access?
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    public static function bindConsole(InputInterface $input, OutputInterface $output): void
    {
        static::$input = $input;
        static::$output = $output;
    }

    /**
     * @return OutputInterface
     */
    public static function getConsoleOutput(): OutputInterface
    {
        return static::$output;
    }
}
