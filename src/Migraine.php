<?php
declare(strict_types=1);

namespace Migraine;

use Migraine\Traits\StorageCollectionTrait;
use Migraine\Traits\TaskCollectionTrait;

/**
 * Class Migraine
 * @package Migraine
 */
class Migraine
{
    /**
     * Traits
     */
    use StorageCollectionTrait;
    use TaskCollectionTrait;

    /**
     * @var string
     */
    protected string $version = '2';

    /**
     * Migraine constructor.
     */
    public function __construct()
    {
        $this->initializeStorageCollection();
        $this->initializeTaskCollection();
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @return TaskRuntime
     */
    protected function createTaskRuntime(): TaskRuntime
    {
        return new TaskRuntime($this);
    }

    /**
     * Create a runtime proxy, then execute the given task.
     *
     * @param string $taskName
     */
    public function execute(string $taskName = 'default')
    {
//        $taskRuntime = $this->createTaskRuntime($this)->execute($taskName);
    }
}
