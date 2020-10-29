<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Storage;
use Migraine\TaskRuntime;

/**
 * Class LimitProcessor
 * @package Migraine\Processor
 */
class LimitProcessor extends AbstractProcessor
{
    /**
     * @var Storage
     */
    protected Storage $storage;

    /**
     * @var int
     */
    protected int $length;

    /**
     * @inheritdoc
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $this->getStorage()->slice(0, $this->getLength());
    }

    /**
     * @return Storage
     */
    public function getStorage(): Storage
    {
        return $this->storage;
    }

    /**
     * @param Storage $storage
     */
    public function setStorage(Storage $storage): void
    {
        $this->storage = $storage;
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
