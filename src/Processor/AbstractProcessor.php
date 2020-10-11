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
     * @var array
     */
    protected array $options;

    /**
     * AbstractProcessor constructor.
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
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
        return isset($this->options[$optionName])
            ? $taskRuntime->getStorage($this->options[$optionName])
            : $taskRuntime->getDefaultStorage();
    }
}
