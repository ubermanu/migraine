<?php

namespace Migraine\Processor;

use Migraine\TaskRuntime;

/**
 * Class UseProcessor
 * @package Migraine\Processor
 */
class UseProcessor extends AbstractProcessor
{
    /**
     * @inheritdoc
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $taskRuntime->setDefaultStorageIdentifier($this->getStorageIdentifier());
    }

    /**
     * @return string
     */
    protected function getStorageIdentifier(): string
    {
        return $this->getData('use');
    }
}
