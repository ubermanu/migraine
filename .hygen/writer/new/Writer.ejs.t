---
to: src/Writer/<%= Name %>Writer.php
---
<?php
declare(strict_types=1);

namespace Migraine\Writer;

use Migraine\Writer\Traits\FileWriterTrait;
use Migraine\Storage;

/**
 * Class <%= Name %>Writer
 * @package Migraine\Writer
 */
class <%= Name %>Writer extends AbstractWriter
{
    use FileWriterTrait;

    /**
     * @inheritDoc
     */
    protected function encodeStorage(string $filename, array $options): string
    {
        return "";
    }
}
