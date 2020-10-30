<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\Processor\Traits\HasOptionalStorageId;
use Migraine\TaskRuntime;

/**
 * Class MapProcessor
 * @package Migraine\Processor
 */
class MapProcessor extends AbstractProcessor
{
    use HasOptionalStorageId;

    /**
     * @Migraine\Configuration\Yaml\Option("map")
     * @var array
     */
    protected array $mapping;

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

            // Backup current record
            $baseRecord = $record;

            // Apply mapping
            foreach ($this->getMapping() as $key => $newKey) {
                if (array_key_exists($key, $baseRecord)) {
                    $record[$newKey] = $baseRecord[$key];
                    if ($key !== $newKey) {
                        unset($record[$key]);
                    }
                }
            }
        }
    }

    /**
     * @return array
     */
    public function getMapping(): array
    {
        return $this->mapping;
    }

    /**
     * @param array $mapping
     */
    public function setMapping(array $mapping): void
    {
        $this->mapping = $mapping;
    }
}
