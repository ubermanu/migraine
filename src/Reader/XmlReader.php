<?php
declare(strict_types=1);

namespace Migraine\Reader;

use Migraine\Reader\Traits\FileReaderTrait;
use Migraine\Storage;

/**
 * Class XmlReader
 * @package Migraine\Reader
 */
class XmlReader extends AbstractReader
{
    use FileReaderTrait;

    /**
     * @inheritDoc
     */
    protected function createStorage(string $filename, array $options): Storage
    {
        $storage = new Storage();
        $xml = new \SimpleXMLElement(file_get_contents($filename));

        if (isset($options['xpath'])) {
            $xml = $xml->xpath($options['xpath']);
        }

        foreach ($xml->children() as $child) {
            $storage->append(get_object_vars($child));
        }

        return $storage;
    }
}
