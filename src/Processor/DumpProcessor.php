<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\TaskRuntime;

/**
 * Class DumpProcessor
 * @package Migraine\Processor
 */
class DumpProcessor extends AbstractProcessor
{
    /**
     * @var string
     */
    protected string $storageId;

    /**
     * @inheritDoc
     * @throws StorageException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        print_r($this->getStorageOrDefault($taskRuntime, $this->getStorageId())->toArray());
        exit;
    }

    /**
     * @return string
     */
    public function getStorageId(): string
    {
        return $this->storageId;
    }

    /**
     * @param string $storageId
     */
    public function setStorageId(string $storageId): void
    {
        $this->storageId = $storageId;
    }
}
