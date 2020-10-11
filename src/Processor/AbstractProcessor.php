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
        if (count($options) > 0) {
            $this->data = $options;
        }
    }

    /**
     * Execute the
     * @param TaskRuntime $taskRuntime
     * @return mixed
     */
    public abstract function execute(TaskRuntime $taskRuntime);

    /**
     * Get a storage using an option value as identifier.
     * If the option does not exist, select the default storage.
     *
     * @param TaskRuntime $taskRuntime
     * @param string $optionName
     * @return Storage
     * @throws StorageException
     */
    protected function getStorageOrDefault(TaskRuntime $taskRuntime, string $optionName): Storage
    {
        return $this->hasData($optionName)
            ? $taskRuntime->getStorage($this->getData($optionName))
            : $taskRuntime->getDefaultStorage();
    }
}
