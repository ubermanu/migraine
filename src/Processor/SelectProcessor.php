<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\TaskRuntime;

/**
 * Class SelectProcessor
 *
 * @method $this setColumns(array $columns)
 * @method string getStorage()
 * @method $this setStorage(string $storage)
 *
 * @package Migraine\Processor
 */
class SelectProcessor extends AbstractProcessor
{
    /**
     * @inheritdoc
     * @throws StorageException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $storage = $this->getStorageOrDefault($taskRuntime, 'storage');

        foreach ($storage as &$record) {
            $record = array_intersect_key($record, array_flip($this->getColumns()));
        }
    }

    /**
     * @return array
     */
    protected function getColumns(): array
    {
        return array_values($this->getData('columns'));
    }
}
