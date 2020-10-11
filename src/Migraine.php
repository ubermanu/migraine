<?php
declare(strict_types=1);

namespace Migraine;

/**
 * Class Migraine
 * @package Migraine
 */
class Migraine
{
    /**
     * @var string
     */
    protected string $version = '2';

    /**
     * @var Task[]
     */
    protected array $tasks = [];

    /**
     * @var Storage[]
     */
    protected array $storages = [];

    /**
     * @var string
     */
    protected string $defaultStorageIdentifier;

    /**
     * Migraine constructor.
     */
    public function __construct()
    {
        $this->defaultStorageIdentifier = 'storage-' . md5(microtime());
//        $this->addStorage(new Storage(), $this->defaultStorageIdentifier);
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
     * @return Storage[]
     */
    public function getStorages(): array
    {
        return $this->storages;
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
