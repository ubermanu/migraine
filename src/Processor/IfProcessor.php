<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Hoa\Ruler\Context;
use Hoa\Ruler\Ruler;
use Migraine\Exception\StorageException;
use Migraine\Exception\TaskException;
use Migraine\TaskRuntime;

/**
 * Class IfProcessor
 * @package Migraine\Processor
 */
class IfProcessor extends AbstractProcessor
{
    /**
     * @inheritdoc
     * @throws StorageException
     * @throws TaskException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $storage = $this->getStorageOrDefault($taskRuntime, 'in');
        $ruler = new Ruler();

        // TODO: Give more values to the context
        $context = new Context();
        $context['storage'] = $storage;

        if ($ruler->assert($this->getCondition(), $context)) {
            $this->forward($taskRuntime, 'then');
        } else {
            $this->forward($taskRuntime, 'else');
        }
    }

    /**
     * @return string
     */
    protected function getCondition(): string
    {
        return $this->options['if'];
    }

    /**
     * Find the task name in the options, and forward to it.
     * If the taskName is empty, do nothing.
     *
     * @param TaskRuntime $taskRuntime
     * @param string $optionName
     * @throws TaskException
     */
    protected function forward(TaskRuntime $taskRuntime, string $optionName): void
    {
        if ($taskName = $this->options[$optionName] ?? '') {
            $taskRuntime->getTask($taskName)->execute($taskRuntime);
        }
    }
}
