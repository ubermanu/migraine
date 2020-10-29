<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\TaskRuntime;
use Migraine\Processor\Traits\IOProcessorTrait;
use Migraine\Writer\AbstractWriter;

/**
 * Class WriteProcessor
 * @package Migraine\Processor
 */
class WriteProcessor extends AbstractProcessor
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
        $className = '\\Migraine\\Writer\\' . ucfirst($resourceType) . 'Writer';

        $storage = $this->getStorageOrDefault($taskRuntime, 'storage');

        /** @var AbstractWriter $writer */
        $writer = new $className();
        $writer->write($storage, $this->getResourceName(), $this->getResourceOptions());
    }

    /**
     * @return string
     */
    protected function getResourceName(): string
    {
        return $this->getData('write');
    }

    /**
     * @param string $resourceName
     * @return $this
     */
    public function setResourceName(string $resourceName): self
    {
        return $this->setData('write', $resourceName);
    }

    /**
     * @return string
     */
    public function getStorage(): string
    {
        return $this->getData('from');
    }

    /**
     * @param string $storage
     * @return $this
     */
    public function setStorage(string $storage): self
    {
        return $this->setData('from', $storage);
    }
}
