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
     * @var string
     */
    protected string $identifier;

    /**
     * @inheritdoc
     * @throws TaskException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $taskRuntime->execute($this->getIdentifier());
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
