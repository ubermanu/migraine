<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Hoa\Ruler\Context;
use Hoa\Ruler\Ruler;
use Migraine\Exception\TaskException;
use Migraine\TaskRuntime;

/**
 * Class IfProcessor
 * @package Migraine\Processor
 */
class IfProcessor extends AbstractProcessor
{
    /**
     * @var string
     */
    protected string $condition;

    /**
     * @var string|null
     */
    protected ?string $then = null;

    /**
     * @var string|null
     */
    protected ?string $else = null;

    /**
     * @inheritDoc
     * @throws TaskException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        // TODO: Use factory
        $ruler = new Ruler();

        // TODO: Use factory
        // TODO: Give more values to the context
        $context = new Context();
//        $context['storage'] = $this->getStorageOrDefault($taskRuntime, 'storage');

        if ($ruler->assert($this->getCondition(), $context)) {
            $this->forward($taskRuntime, $this->getThen());
        } else {
            $this->forward($taskRuntime, $this->getElse());
        }
    }

    /**
     * Execute the task by id, if null do nothing.
     *
     * @param TaskRuntime $taskRuntime
     * @param string|null $taskId
     * @throws TaskException
     */
    protected function forward(TaskRuntime $taskRuntime, ?string $taskId): void
    {
        if (false === is_null($taskId)) {
            $taskRuntime->execute($taskId);
        }
    }

    /**
     * @return string
     */
    public function getCondition(): string
    {
        return $this->condition;
    }

    /**
     * @param string $condition
     */
    public function setCondition(string $condition): void
    {
        $this->condition = $condition;
    }

    /**
     * @return string|null
     */
    public function getThen(): ?string
    {
        return $this->then;
    }

    /**
     * @param string|null $then
     */
    public function setThen(?string $then): void
    {
        $this->then = $then;
    }

    /**
     * @return string|null
     */
    public function getElse(): ?string
    {
        return $this->else;
    }

    /**
     * @param string|null $else
     */
    public function setElse(?string $else): void
    {
        $this->else = $else;
    }
}
