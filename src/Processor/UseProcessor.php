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
        $taskRuntime->setDefaultStorageIdentifier($this->getStorage());
    }

    /**
     * @return string
     */
    public function getStorage(): string
    {
        return $this->getData('use');
    }

    /**
     * @param string $storage
     * @return $this
     */
    public function setStorage(string $storage): self
    {
        return $this->setData('use', $storage);
    }
}
