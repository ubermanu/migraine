<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\TaskRuntime;

/**
 * Class LimitProcessor
 * @package Migraine\Processor
 */
class LimitProcessor extends AbstractProcessor
{
    /**
     * @inheritdoc
     * @throws StorageException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $this->getStorageOrDefault($taskRuntime, 'in')->slice(0, $this->getLength());
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->getData('limit');
    }

    /**
     * @param int $length
     * @return $this
     */
    public function setLength(int $length): self
    {
        return $this->setData('limit', $length);
    }

    /**
     * @return string
     */
    public function getStorage(): string
    {
        return $this->getData('in');
    }

    /**
     * @param string $storage
     * @return $this
     */
    public function setStorage(string $storage): self
    {
        return $this->setData('in', $storage);
    }
}
