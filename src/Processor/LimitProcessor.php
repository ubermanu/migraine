<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\Processor\Traits\HasOptionalStorageId;
use Migraine\TaskRuntime;

/**
 * Class LimitProcessor
 * @package Migraine\Processor
 */
class LimitProcessor extends AbstractProcessor
{
    use HasOptionalStorageId;

    /**
     * @Migraine\Configuration\Yaml\Option("limit")
     * @var int
     */
    protected int $length;

    /**
     * @Migraine\Configuration\Yaml\Option("in")
     * @var string|null
     */
    protected ?string $storageId = null;

    /**
     * @inheritDoc
     * @throws StorageException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $this->getStorageOrDefault($taskRuntime, $this->getStorageId())->slice(0, $this->getLength());
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     */
    public function setLength(int $length): void
    {
        $this->length = $length;
    }
}
