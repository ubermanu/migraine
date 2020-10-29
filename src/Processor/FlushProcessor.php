<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Storage;
use Migraine\TaskRuntime;

/**
 * Class FlushProcessor
 * @package Migraine\Processor
 */
class FlushProcessor extends AbstractProcessor
{
    /**
     * @var Storage
     */
    protected Storage $storage;

    /**
     * @inheritdoc
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $this->getStorage()->flush();
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
}
