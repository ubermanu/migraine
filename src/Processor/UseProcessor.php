<?php

namespace Migraine\Processor;

use Migraine\Processor\Traits\HasOptionalStorageId;
use Migraine\TaskRuntime;

/**
 * Class UseProcessor
 * @package Migraine\Processor
 */
class UseProcessor extends AbstractProcessor
{
    use HasOptionalStorageId;

    /**
     * @Migraine\Configuration\Yaml\Option("use")
     * @var string|null
     */
    protected ?string $storageId = null;

    /**
     * @inheritDoc
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $taskRuntime->setDefaultStorageIdentifier($this->getStorageId());
    }
}
