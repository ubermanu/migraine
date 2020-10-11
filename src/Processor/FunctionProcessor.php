<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\TaskRuntime;

/**
 * Class FunctionProcessor
 * @package Migraine\Processor
 */
class FunctionProcessor extends AbstractProcessor
{
    /**
     * @inheritdoc
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        call_user_func($this->getFunction(), $taskRuntime, $this->data);
    }

    /**
     * @return array|string|callable
     */
    protected function getFunction()
    {
        return $this->getData('function');
    }
}
