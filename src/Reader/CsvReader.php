<?php
declare(strict_types=1);

namespace Migraine\Reader;

use Migraine\Reader\Traits\FileReaderTrait;
use Migraine\Storage;

/**
 * Class CsvReader
 * @package Migraine\Reader
 */
class CsvReader extends AbstractReader
{
    use FileReaderTrait;

    /**
     * @inheritDoc
     */
    protected function createStorage(string $filename, array $options): Storage
    {
        $storage = new Storage();

        $defaultOptions = [
            'delimiter' => ',',
            'enclosure' => '"',
            'escape' => '\\',
            'header' => true,
        ];

        $options = array_replace($defaultOptions, $options);
        $header = [];

        foreach (file($filename) as $line) {
            $data = str_getcsv($line, $options['delimiter'], $options['enclosure'], $options['escape']);

            // Set the first line as the header
            if (empty($header) && $options['header']) {
                $header = $data;
                continue;
            }

            $storage->append(array_combine($header, $data));
        }

        return $storage;
    }
}
