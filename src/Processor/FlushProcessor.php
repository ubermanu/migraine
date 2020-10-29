<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\Processor\Traits\HasOptionalStorageId;
use Migraine\TaskRuntime;

/**
 * Class FlushProcessor
 * @package Migraine\Processor
 */
class FlushProcessor extends AbstractProcessor
{
    use HasOptionalStorageId;

    /**
     * @inheritDoc
     * @throws StorageException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $this->getStorageOrDefault($taskRuntime, $this->getStorageId())->flush();
    }
}
