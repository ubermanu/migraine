<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\TaskRuntime;

/**
 * Class LimitProcessor
 * @package Migraine\Processor
 */
class LimitProcessor extends AbstractProcessor
{
    /**
     * @inheritdoc
     * @throws StorageException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $this->getStorageOrDefault($taskRuntime, 'in')->slice(0, $this->getLength());
    }

    /**
     * @return int
     */
    protected function getLength(): int
    {
        return $this->getData('limit') ?? 0;
    }
}
