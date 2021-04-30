<?php
declare(strict_types=1);

namespace Migraine;

use Migraine\Exception\StorageException;
use Migraine\Traits\ConsoleLoggerTrait;
use Migraine\Traits\StorageCollectionTrait;
use Migraine\Traits\TaskCollectionTrait;

/**
 * Class TaskRuntime
 * @package Migraine
 */
class TaskRuntime
{
    use StorageCollectionTrait,
        TaskCollectionTrait,
        ConsoleLoggerTrait;

    /**
     * @var string
     */
    protected string $defaultStorageIdentifier;

    /**
     * TaskRuntime constructor.
     * @param Migraine|null $migraine
     * @throws StorageException
     */
    public function __construct(?Migraine $migraine = null)
    {
        if ($migraine) {
            $this->storages = $migraine->getStorages();
            $this->tasks = $migraine->getTasks();
            $this->logger = $migraine->getLogger();
        }

        $this->setDefaultStorageIdentifier('storage-' . md5(microtime()));
        $this->addStorage($this->defaultStorageIdentifier, new Storage());
    }

    /**
     * @param string $identifier
     */
    public function setDefaultStorageIdentifier(string $identifier): void
    {
        $this->defaultStorageIdentifier = $identifier;
    }

    /**
     * @return Storage
     * @throws StorageException
     */
    public function getDefaultStorage(): Storage
    {
        return $this->getStorage($this->defaultStorageIdentifier);
    }

    /**
     * @param string $taskName
     * @throws Exception\TaskException
     */
    public function execute(string $taskName): void
    {
        $this->getLogger()?->debug(sprintf('Run task "%s"', $taskName));
        $this->getTask($taskName)->execute($this);
    }
}
