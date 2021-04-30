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
     * @var ConsoleLogger|null
     */
    protected ?ConsoleLogger $logger = null;

    /**
     * @param ConsoleLogger $logger
     */
    public function setLogger(ConsoleLogger $logger): void
    {
        $this->logger = $logger;
    }

    /**
     * @return ConsoleLogger|null
     */
    public function getLogger(): ?ConsoleLogger
    {
        return $this->logger;
    }
}
