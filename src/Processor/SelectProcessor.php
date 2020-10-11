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
        foreach ($this->getStorageOrDefault($taskRuntime, 'in') as &$record) {
            $record = array_intersect_key($record, array_flip($this->getSelectedKeys()));
        }
    }

    /**
     * @return array
     */
    protected function getSelectedKeys(): array
    {
        return array_values($this->options['select']);
    }
}
