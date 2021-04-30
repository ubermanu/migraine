<?php
declare(strict_types=1);

namespace Migraine;

use Migraine\Traits\ConsoleLoggerTrait;
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
        VersionManagerTrait,
        ConsoleLoggerTrait;

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
        $start = microtime(true);

        $taskRuntime = $this->createTaskRuntime();
        $taskRuntime->execute($taskName);

        $elapsed = microtime(true) - $start;
        $taskRuntime->getLogger()?->notice(sprintf('✓ Executed in %0.4fs', $elapsed));

        return $taskRuntime;
    }
}
