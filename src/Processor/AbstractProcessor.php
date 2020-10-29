<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\Storage;
use Migraine\TaskRuntime;
use Migraine\Traits\DataObjectTrait;

/**
 * Class AbstractProcessor
 * @package Migraine\Processor
 */
abstract class AbstractProcessor
{
    use DataObjectTrait;

    /**
     * AbstractProcessor constructor.
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->data = array_replace($this->data, $options);
    }

    /**
     * Execute the processor.
     * @param TaskRuntime $taskRuntime
     * @return mixed
     */
    public abstract function execute(TaskRuntime $taskRuntime);

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
        }

        return $taskRuntime->getDefaultStorage();
    }
}
