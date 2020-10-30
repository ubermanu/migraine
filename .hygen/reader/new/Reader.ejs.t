---
to: src/Reader/<%= Name %>Reader.php
---
<?php
declare(strict_types=1);

namespace Migraine\Reader;

use Migraine\Reader\Traits\FileReaderTrait;
use Migraine\Storage;

/**
 * Class <%= Name %>Reader
 * @package Migraine\Reader
 */
class <%= Name %>Reader extends AbstractReader
{
    use FileReaderTrait;

    /**
     * @inheritDoc
     */
    protected function createStorage(string $filename, array $options): Storage
    {
        return new Storage();
    }
}
