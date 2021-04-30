<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\Storage;
use Migraine\TaskRuntime;

/**
 * Class AbstractProcessor
 * @package Migraine\Processor
 */
abstract class AbstractProcessor
{
    /**
     * Execute the processor.
     * @param TaskRuntime $taskRuntime
     */
    public abstract function execute(TaskRuntime $taskRuntime): void;

    /**
     * If the storage does not exists, returns the default one.
     *
     * @param TaskRuntime $taskRuntime
     * @param string|null $storageId
     * @return Storage
     * @throws StorageException
     */
    protected function getStorageOrDefault(TaskRuntime $taskRuntime, ?string $storageId): Storage
    {
        try {
            if (false === is_null($storageId)) {
                return $taskRuntime->getStorage($storageId);
            }
        } catch (StorageException $e) {
            $taskRuntime->getLogger()?->warning($e->getMessage());
            $taskRuntime->getLogger()?->warning('↳ Fallback on the default storage');
        }

        return $taskRuntime->getDefaultStorage();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return \json_encode(get_object_vars($this), JSON_FORCE_OBJECT);
    }
}
