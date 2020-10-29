<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\Processor\Traits\IOProcessorTrait;
use Migraine\Reader\AbstractReader;
use Migraine\TaskRuntime;

/**
 * Class ReadProcessor
 * @package Migraine\Processor
 */
class ReadProcessor extends AbstractProcessor
{
    use IOProcessorTrait;

    /**
     * @inheritDoc
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

        $this->getStorageOrDefault($taskRuntime, 'from')->copy($storage);
    }

    /**
     * @return string
     */
    public function getResourceName(): string
    {
        return $this->getData('read');
    }

    /**
     * @param string $resourceName
     * @return $this
     */
    public function setResourceName(string $resourceName): self
    {
        return $this->setData('read', $resourceName);
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
