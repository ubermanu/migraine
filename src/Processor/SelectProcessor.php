<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\TaskRuntime;

/**
 * Class SelectProcessor
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
        $storage = $this->getStorageOrDefault($taskRuntime, 'in');

        foreach ($storage as &$record) {
            $record = array_intersect_key($record, array_flip($this->getColumns()));
        }
    }

    /**
     * @return array
     */
    public function getColumns(): array
    {
        return array_values($this->getData('select'));
    }

    /**
     * @param array $columns
     * @return $this
     */
    public function setColumns(array $columns): self
    {
        return $this->setData('select', $columns);
    }

    /**
     * @return string
     */
    public function getStorage(): string
    {
        return $this->getData('in');
    }

    /**
     * @param string $storage
     * @return $this
     */
    public function setStorage(string $storage): self
    {
        return $this->setData('in', $storage);
    }
}
