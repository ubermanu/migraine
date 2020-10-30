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
     * @Migraine\Configuration\Yaml\Option("flush")
     * @var string|null
     */
    protected ?string $storageId = null;

    /**
     * @inheritDoc
     * @throws StorageException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $this->getStorageOrDefault($taskRuntime, $this->getStorageId())->flush();
    }
}
