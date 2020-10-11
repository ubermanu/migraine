<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\TaskException;
use Migraine\TaskRuntime;

/**
 * Class TaskProcessor
 *
 * @method string getTask()
 * @method $this setTask(string $task)
 *
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
        $taskRuntime->execute($this->getTask());
    }
}
