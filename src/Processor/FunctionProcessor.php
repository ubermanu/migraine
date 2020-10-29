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
     * @var callable
     */
    protected $function;

    /**
     * @var array
     */
    protected array $parameters = [];

    /**
     * @inheritdoc
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        call_user_func($this->getFunction(), $this->getParameters(), $taskRuntime);
    }

    /**
     * @return callable
     */
    public function getFunction(): callable
    {
        return $this->function;
    }

    /**
     * @param callable $function
     */
    public function setFunction(callable $function): void
    {
        $this->function = $function;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     */
    public function setParameters(array $parameters): void
    {
        $this->parameters = $parameters;
    }
}
