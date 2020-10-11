<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\TaskRuntime;

/**
 * Class MapProcessor
 * @package Migraine\Processor
 */
class MapProcessor extends AbstractProcessor
{
    /**
     * @inheritdoc
     * @throws StorageException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $storage = $this->getStorageOrDefault($taskRuntime, 'in');

        foreach ($storage as &$record) {

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
        return $this->getData('map');
    }

    /**
     * @param array $mapping
     * @return $this
     */
    public function setMapping(array $mapping): self
    {
        return $this->setData('map', $mapping);
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
