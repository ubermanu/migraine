<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Storage;
use Migraine\TaskRuntime;

/**
 * Class DumpProcessor
 * @package Migraine\Processor
 */
class DumpProcessor extends AbstractProcessor
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
        print_r($this->getStorage()->toArray());
        exit;
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
