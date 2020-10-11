<?php
declare(strict_types=1);

namespace Migraine;

use Migraine\Traits\StorageCollectionTrait;

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

    /**
     * @var string
     */
    protected string $version = '2';

    /**
     * @var Task[]
     */
    protected array $tasks = [];

    /**
     * Migraine constructor.
     */
    public function __construct()
    {
        $this->initializeStorageCollection();
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @return Task[]
     */
    public function getTasks(): array
    {
        return $this->tasks;
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
