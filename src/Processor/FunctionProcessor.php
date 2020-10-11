<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\TaskRuntime;

/**
 * Class FunctionProcessor
 *
 * @method string getFunction()
 * @method $this setFunction(string $function)
 *
 * @package Migraine\Processor
 */
class FunctionProcessor extends AbstractProcessor
{
    /**
     * @var array
     */
    protected array $data = [
        'function' => null,
    ];

    /**
     * @inheritdoc
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        call_user_func($this->getFunction(), $taskRuntime, $this->data);
    }
}
