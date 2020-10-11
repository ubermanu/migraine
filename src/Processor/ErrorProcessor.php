<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\ErrorException;
use Migraine\TaskRuntime;

/**
 * Class ErrorProcessor
 *
 * @method string getMessage()
 * @method $this setMessage(string $message)
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
        'message' => null,
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
}
