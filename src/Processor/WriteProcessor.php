<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\Processor\Traits\HasOptionalStorageId;
use Migraine\Processor\Traits\IOProcessorTrait;
use Migraine\TaskRuntime;
use Migraine\Writer\AbstractWriter;

/**
 * Class WriteProcessor
 * @package Migraine\Processor
 */
class WriteProcessor extends AbstractProcessor
{
    use IOProcessorTrait,
        HasOptionalStorageId;

    /**
     * @Migraine\Configuration\Yaml\Option("write")
     * @var string
     */
    protected string $resourceName;

    /**
     * @Migraine\Configuration\Yaml\Option("from")
     * @var string|null
     */
    protected ?string $storageId = null;

    /**
     * @inheritDoc
     * @throws StorageException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $resourceType = $this->getResourceType();

        // TODO: Override by settings
        $className = '\\Migraine\\Writer\\' . ucfirst($resourceType) . 'Writer';

        $storage = $this->getStorageOrDefault($taskRuntime, $this->getStorageId());

        /** @var AbstractWriter $writer */
        $writer = new $className();
        $writer->write($storage, $this->getResourceName(), $this->getResourceOptions());
    }
}
