<?php
declare(strict_types=1);

namespace Migraine\Traits;

use Migraine\Exception\StorageException;
use Migraine\Storage;

/**
 * Class StorageCollectionTrait
 * @package Migraine\Traits
 */
trait StorageCollectionTrait
{
    /**
     * @var Storage[]
     */
    protected array $storages;

    /**
     * @var string
     */
    protected string $defaultStorageIdentifier;

    /**
     * Initialize storage collection.
     */
    protected function initializeStorageCollection()
    {
        $this->storages = [];
        $this->defaultStorageIdentifier = 'storage-' . md5(microtime());
        $this->storages[$this->defaultStorageIdentifier] = new Storage();
    }

    /**
     * @param string $identifier
     * @return Storage
     * @throws StorageException
     */
    public function getStorage(string $identifier): Storage
    {
        if (empty($this->storages[$identifier])) {
            throw new StorageException(sprintf('Unknown storage "%s"!', $identifier));
        }

        return $this->storages[$identifier];
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
     * @return Storage[]
     */
    public function getStorages(): array
    {
        return $this->storages;
    }

    /**
     * @param string $identifier
     * @param Storage $storage
     * @throws StorageException
     */
    public function addStorage(string $identifier, Storage $storage): void
    {
        if (!empty($this->storages[$identifier])) {
            throw new StorageException(sprintf('The storage "%s" already exists!', $identifier));
        }

        $this->storages[$identifier] = $storage;
    }
}
