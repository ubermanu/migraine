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
     * @inheritDoc
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $taskRuntime->setDefaultStorageIdentifier($this->getStorageId());
    }
}
