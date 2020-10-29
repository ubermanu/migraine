<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Storage;
use Migraine\TaskRuntime;

/**
 * Class SelectProcessor
 * @package Migraine\Processor
 */
class SelectProcessor extends AbstractProcessor
{
    /**
     * @var Storage
     */
    protected Storage $storage;

    /**
     * @var array
     */
    protected array $columns;

    /**
     * @inheritdoc
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        foreach ($this->getStorage() as &$record) {
            $record = array_intersect_key($record, array_flip($this->getColumns()));
        }
    }

    /**
     * @return Storage
     */
    public function getStorage(): Storage
    {
        return $this->storage;
    }

    /**
     * @param Storage $storage
     */
    public function setStorage(Storage $storage): void
    {
        $this->storage = $storage;
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
