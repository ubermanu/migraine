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
     * @Migraine\Configuration\Yaml\Option("select")
     * @var array
     */
    protected array $columns;

    /**
     * @Migraine\Configuration\Yaml\Option("in")
     * @var string|null
     */
    protected ?string $storageId = null;

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
