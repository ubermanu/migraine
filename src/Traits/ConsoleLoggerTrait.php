<?php
declare(strict_types=1);

namespace Migraine\Traits;

use Symfony\Component\Console\Logger\ConsoleLogger;

/**
 * Trait ConsoleLoggerTrait
 * @package Migraine\Traits
 */
trait ConsoleLoggerTrait
{
    /**
     * @var ConsoleLogger
     */
    protected ConsoleLogger $logger;

    /**
     * @param ConsoleLogger $logger
     */
    public function setLogger(ConsoleLogger $logger): void
    {
        $this->logger = $logger;
    }

    /**
     * @return ConsoleLogger
     */
    public function getLogger(): ConsoleLogger
    {
        return $this->logger;
    }
}
