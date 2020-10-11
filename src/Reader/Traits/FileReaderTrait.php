<?php
declare(strict_types=1);

namespace Migraine\Reader\Traits;

use Migraine\Storage;

/**
 * Trait FileReaderTrait
 * @package Migraine\Reader\Traits
 */
trait FileReaderTrait
{
    /**
     * @inheritdoc
     */
    public function read(?string $resource, array $options): Storage
    {
        if (empty($resource)) {
            throw new \Error('No filename defined');
        }

        if (!file_exists($resource)) {
            throw new \Error(sprintf('The file "%s" does not exist', $resource));
        }

        return $this->createStorage($resource, $options);
    }

    /**
     * Create a storage from a file content.
     *
     * @param string $filename
     * @param array $options
     * @return Storage
     */
    protected abstract function createStorage(string $filename, array $options): Storage;
}
