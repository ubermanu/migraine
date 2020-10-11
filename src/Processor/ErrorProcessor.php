<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\ErrorException;
use Migraine\TaskRuntime;

/**
 * Class ErrorProcessor
 * @package Migraine\Processor
 */
class ErrorProcessor extends AbstractProcessor
{
    /**
     * @inheritdoc
     * @throws ErrorException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        throw new ErrorException($this->getMessage(), $this->getCode(), $this->getSeverity());
    }

    /**
     * @return string
     */
    protected function getMessage(): string
    {
        return $this->options['error'];
    }

    /**
     * @return int
     */
    protected function getCode(): int
    {
        return $this->options['code'] ?? 0;
    }

    /**
     * @return int
     */
    protected function getSeverity(): int
    {
        return $this->options['severity'] ?? 1;
    }
}
