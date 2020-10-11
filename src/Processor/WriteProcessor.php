<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\TaskRuntime;
use Migraine\Processor\Traits\ResourceProcessorTrait;
use Migraine\Writer\AbstractWriter;

/**
 * Class WriteProcessor
 * @package Migraine\Processor
 */
class WriteProcessor extends AbstractProcessor
{
    use ResourceProcessorTrait;

    /**
     * @return string
     */
    protected function getResourceName(): string
    {
        return $this->options['write'];
    }

    /**
     * @inheritdoc
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $resourceType = $this->getResourceType();

        // TODO: Override by settings
        $className = '\\Migraine\\Writer\\' . ucfirst($resourceType) . 'Writer';

        $storage = $this->getStorageOrDefault($taskRuntime, 'from');

        /** @var AbstractWriter $writer */
        $writer = new $className();
        $writer->write($storage, $this->getResourceName(), $this->getResourceOptions());
    }
}
