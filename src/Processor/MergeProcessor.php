<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\TaskRuntime;

/**
 * Class MergeProcessor
 *
 * @method array getMerging()
 * @method $this setMerging(array $storages)
 * @method string getStorage()
 * @method $this setStorage(string $storage)
 *
 * @package Migraine\Processor
 */
class MergeProcessor extends AbstractProcessor
{
    /**
     * @var array
     */
    protected array $data = [
        'storage' => null,
        'merging' => null,
    ];

    /**
     * @inheritDoc
     * @throws StorageException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $storage = $this->getStorageOrDefault($taskRuntime, 'storage');

        foreach ($this->getMergingStorages() as $identifier) {
            foreach ($taskRuntime->getStorage($identifier) as $row) {
                $storage->add($row);
            }
        }
    }

    /**
     * @return string[]
     */
    protected function getMergingStorages(): array
    {
        $identifiers = $this->getData('merging') ?? [];

        if (is_string($identifiers)) {
            $identifiers = [$identifiers];
        }

        return $identifiers;
    }
}
