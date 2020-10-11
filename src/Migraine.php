<?php
declare(strict_types=1);

namespace Migraine;

use Migraine\Traits\StorageCollectionTrait;
use Migraine\Traits\TaskCollectionTrait;
use Migraine\Traits\VersionManagerTrait;

/**
 * Class Migraine
 * @package Migraine
 */
class Migraine
{
    use StorageCollectionTrait,
        TaskCollectionTrait,
        VersionManagerTrait;

    /**
     * @return TaskRuntime
     * @throws Exception\StorageException
     */
    protected function createTaskRuntime(): TaskRuntime
    {
        return new TaskRuntime($this);
    }

    /**
     * Create a runtime proxy, then execute the given task.
     *
     * @param string $taskName
     * @return TaskRuntime
     * @throws Exception\StorageException
     * @throws Exception\TaskException
     */
    public function execute(string $taskName = 'default'): TaskRuntime
    {
        $taskRuntime = $this->createTaskRuntime();
        $this->getTask($taskName)->execute($taskRuntime);

        return $taskRuntime;
    }
}
