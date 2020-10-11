<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\TaskRuntime;
use Migraine\Processor\Traits\IOProcessorTrait;
use Migraine\Writer\AbstractWriter;

/**
 * Class WriteProcessor
 *
 * @method $this setResourceName(string $resourceName)
 * @method string getStorage()
 * @method $this setStorage(string $storage)
 *
 * @package Migraine\Processor
 */
class WriteProcessor extends AbstractProcessor
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
     * @return string
     */
    protected function getResourceName(): string
    {
        return $this->getData('resource_name');
    }

    /**
     * @inheritdoc
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
}
