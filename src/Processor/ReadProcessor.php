<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\Processor\Traits\IOProcessorTrait;
use Migraine\Reader\AbstractReader;
use Migraine\TaskRuntime;

/**
 * Class ReadProcessor
 *
 * @method $this setResourceName(string $resourceName)
 * @method string getStorage()
 * @method $this setStorage(string $storage)
 *
 * @package Migraine\Processor
 */
class ReadProcessor extends AbstractProcessor
{
    use IOProcessorTrait;

    /**
     * @var array
     */
    protected array $data = [
        'resource_name' => null,
        'storage' => null,
    ];

    /**
     * @param TaskRuntime $taskRuntime
     * @throws StorageException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $resourceType = $this->getResourceType();

        // TODO: Override by settings
        $className = '\\Migraine\\Reader\\' . ucfirst($resourceType) . 'Reader';

        /** @var AbstractReader $reader */
        $reader = new $className();
        $storage = $reader->read($this->getResourceName(), $this->getResourceOptions());

        $this->getStorageOrDefault($taskRuntime, 'storage')->copy($storage);
    }

    /**
     * @return string
     */
    protected function getResourceName(): string
    {
        return $this->getData('resource_name');
    }
}
