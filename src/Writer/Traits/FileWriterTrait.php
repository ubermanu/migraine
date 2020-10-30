<?php
declare(strict_types=1);

namespace Migraine\Writer\Traits;

use Migraine\Exception\WriterException;
use Migraine\Storage;

/**
 * Trait FileWriterTrait
 * @package Migraine\Writer\Traits
 */
trait FileWriterTrait
{
    /**
     * @inheritDoc
     * @throws WriterException
     */
    public function write(Storage $storage, ?string $resource, array $options): void
    {
        if (empty($resource)) {
            throw new WriterException('No filename defined!');
        }

        file_put_contents($resource, $this->encodeStorage($storage, $options));
    }

    /**
     * Encode storage data into a readable string to put into destination file.
     *
     * @param Storage $storage
     * @param array $options
     * @return string
     */
    protected abstract function encodeStorage(Storage $storage, array $options): string;
}
