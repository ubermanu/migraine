<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\Processor\Traits\HasOptionalStorageId;
use Migraine\TaskRuntime;

/**
 * Class SelectProcessor
 * @package Migraine\Processor
 */
class SelectProcessor extends AbstractProcessor
{
    use HasOptionalStorageId;

    /**
     * @var array
     */
    protected array $columns;

    /**
     * @inheritDoc
     * @throws StorageException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        foreach ($this->getStorageOrDefault($taskRuntime, $this->getStorageId()) as &$record) {
            $record = array_intersect_key($record, array_flip($this->getColumns()));
        }
    }

    /**
     * @return array
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * @param array $columns
     */
    public function setColumns(array $columns): void
    {
        $this->columns = $columns;
    }
}
