<?php
declare(strict_types=1);

namespace Migraine\Writer;

use Migraine\Storage;
use Migraine\Writer\Traits\FileWriterTrait;

/**
 * Class JsonWriter
 * @package Migraine\Writer
 */
class JsonWriter extends AbstractWriter
{
    use FileWriterTrait;

    /**
     * @inheritDoc
     */
    protected function encodeStorage(Storage $storage, array $options): string
    {
        // TODO: Add json encode parameters from options
        return \json_encode(iterator_to_array($storage));
    }
}
