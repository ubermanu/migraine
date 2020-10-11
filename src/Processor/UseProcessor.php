<?php

namespace Migraine\Processor;

use Migraine\TaskRuntime;

/**
 * Class UseProcessor
 *
 * @method string getStorage()
 * @method $this setStorage(string $storage)
 *
 * @package Migraine\Processor
 */
class UseProcessor extends AbstractProcessor
{
    /**
     * @inheritdoc
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $taskRuntime->setDefaultStorageIdentifier($this->getStorage());
    }
}
