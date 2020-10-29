<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Storage;
use Migraine\TaskRuntime;

/**
 * Class MapProcessor
 * @package Migraine\Processor
 */
class MapProcessor extends AbstractProcessor
{
    /**
     * @var Storage
     */
    protected Storage $storage;

    /**
     * @var array
     */
    protected array $mapping;

    /**
     * @inheritdoc
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        foreach ($this->getStorage() as &$record) {

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
