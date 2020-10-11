<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\TaskException;
use Migraine\TaskRuntime;

/**
 * Class TaskProcessor
 * @package Migraine\Processor
 */
class TaskProcessor extends AbstractProcessor
{
    /**
     * @inheritdoc
     * @throws TaskException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $taskRuntime->execute($this->getTaskName());
    }

    /**
     * @return string
     */
    protected function getTaskName(): string
    {
        return $this->options['task'];
    }
}
