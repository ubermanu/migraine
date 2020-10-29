<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\Processor\Traits\HasOptionalStorageId;
use Migraine\Processor\Traits\IOProcessorTrait;
use Migraine\Reader\AbstractReader;
use Migraine\TaskRuntime;

/**
 * Class ReadProcessor
 * @package Migraine\Processor
 */
class ReadProcessor extends AbstractProcessor
{
    use IOProcessorTrait,
        HasOptionalStorageId;

    /**
     * @inheritDoc
     * @throws StorageException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $resourceType = $this->getResourceType();

        // TODO: Override by settings
        $className = '\\Migraine\\Reader\\' . ucfirst($resourceType) . 'Reader';

        /** @var AbstractReader $reader */
        $reader = new $className();
        $storage = $reader->read($this->getResourceName(), $this->getResourceOptions());

        $this->getStorageOrDefault($taskRuntime, $this->getStorageId())->copy($storage);
    }
}
