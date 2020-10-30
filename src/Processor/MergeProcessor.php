<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\Processor\Traits\HasOptionalStorageId;
use Migraine\TaskRuntime;

/**
 * Class MergeProcessor
 * @package Migraine\Processor
 */
class MergeProcessor extends AbstractProcessor
{
    use HasOptionalStorageId;

    /**
     * @Migraine\Configuration\Yaml\Option("in")
     * @var string|null
     */
    protected ?string $storageId = null;

    /**
     * @var array
     */
    protected array $mergingStorageIds;

    /**
     * @inheritDoc
     * @throws StorageException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $sourceStorage = $this->getStorageOrDefault($taskRuntime, $this->getStorageId());

        foreach ($this->getMergingStorageIds() as $identifier) {
            foreach ($taskRuntime->getStorage($identifier) as $row) {
                $sourceStorage->add($row);
            }
        }
    }

    /**
     * @return array
     */
    public function getMergingStorageIds(): array
    {
        return $this->mergingStorageIds;
    }

    /**
     * @param array $mergingStorageIds
     */
    public function setMergingStorageIds(array $mergingStorageIds): void
    {
        $this->mergingStorageIds = $mergingStorageIds;
    }
}
