<?php
declare(strict_types=1);

namespace Migraine\Traits;

use Migraine\Exception\TaskException;
use Migraine\Task;

/**
 * Trait TaskCollectionTrait
 * @package Migraine\Traits
 */
trait TaskCollectionTrait
{
    /**
     * @var Task[]
     */
    protected array $tasks;

    /**
     * Initialize task collection.
     */
    protected function initializeTaskCollection()
    {
        $this->tasks = [];
    }

    /**
     * @param string $identifier
     * @return Task
     * @throws TaskException
     */
    public function getTask(string $identifier): Task
    {
        if (empty($this->tasks[$identifier])) {
            throw new TaskException(sprintf('Unknown task "%s"!', $identifier));
        }

        return $this->tasks[$identifier];
    }

    /**
     * @return Task[]
     */
    public function getTasks(): array
    {
        return $this->tasks;
    }

    /**
     * @param string $identifier
     * @param Task $Task
     * @throws TaskException
     */
    public function addTask(string $identifier, Task $Task): void
    {
        if (!empty($this->tasks[$identifier])) {
            throw new TaskException(sprintf('The task "%s" already exists!', $identifier));
        }

        $this->tasks[$identifier] = $Task;
    }
}
