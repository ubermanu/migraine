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
     * @var string
     */
    protected string $identifier;

    /**
     * @inheritdoc
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $taskRuntime->setDefaultStorageIdentifier($this->getIdentifier());
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @param string $identifier
     */
    public function setIdentifier(string $identifier): void
    {
        $this->identifier = $identifier;
    }
}
