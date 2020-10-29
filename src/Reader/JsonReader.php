<?php
declare(strict_types=1);

namespace Migraine\Reader;

use Migraine\Reader\Traits\FileReaderTrait;
use Migraine\Storage;

/**
 * Class JsonReader
 * @package Migraine\Reader
 */
class JsonReader extends AbstractReader
{
    use FileReaderTrait;

    /**
     * @inheritDoc
     */
    protected function createStorage(string $filename, array $options): Storage
    {
        return new Storage(\json_decode(file_get_contents($filename), true));
    }
}
