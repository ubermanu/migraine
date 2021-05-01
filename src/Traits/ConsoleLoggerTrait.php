<?php
declare(strict_types=1);

namespace Migraine\Traits;

use Psr\Log\LoggerInterface;

/**
 * Trait ConsoleLoggerTrait
 * @package Migraine\Traits
 */
trait ConsoleLoggerTrait
{
    /**
     * @var LoggerInterface|null
     */
    protected ?LoggerInterface $logger = null;

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    /**
     * @return LoggerInterface|null
     */
    public function getLogger(): ?LoggerInterface
    {
        return $this->logger;
    }
}
