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
     * @var string
     */
    protected string $message;

    /**
     * @var int
     */
    protected int $code = 0;

    /**
     * @var int
     */
    protected int $severity = 1;

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
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode(int $code): void
    {
        $this->code = $code;
    }

    /**
     * @return int
     */
    public function getSeverity(): int
    {
        return $this->severity;
    }

    /**
     * @param int $severity
     */
    public function setSeverity(int $severity): void
    {
        $this->severity = $severity;
    }
}
