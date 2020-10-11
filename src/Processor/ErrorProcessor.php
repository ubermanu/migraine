<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\ErrorException;
use Migraine\TaskRuntime;

/**
 * Class ErrorProcessor
 *
 * @method int getCode()
 * @method $this setCode(int $code)
 * @method int getSeverity()
 * @method $this setSeverity(int $severity)
 *
 * @package Migraine\Processor
 */
class ErrorProcessor extends AbstractProcessor
{
    /**
     * @var array
     */
    protected array $data = [
        'code' => 0,
        'severity' => 1,
    ];

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
        return $this->getData('error');
    }

    /**
     * @param string $message
     * @return $this
     */
    public function setMessage(string $message): self
    {
        return $this->setData('error', $message);
    }
}
