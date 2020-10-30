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
     * @Migraine\Configuration\Yaml\Option("task")
     * @var string
     */
    protected string $taskId;

    /**
     * @inheritDoc
     * @throws TaskException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $taskRuntime->execute($this->getTaskId());
    }

    /**
     * @return string
     */
    public function getTaskId(): string
    {
        return $this->taskId;
    }

    /**
     * @param string $taskId
     */
    public function setTaskId(string $taskId): void
    {
        $this->taskId = $taskId;
    }
}
