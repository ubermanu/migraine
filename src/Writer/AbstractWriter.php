<?php
declare(strict_types=1);

namespace Migraine\Writer;

use Migraine\Storage;

/**
 * Class AbstractWriter
 * @package Migraine\Writer
 */
abstract class AbstractWriter
{
    /**
     * @param Storage $storage
     * @param string|null $resource
     * @param array $options
     */
    public abstract function write(Storage $storage, ?string $resource, array $options): void;
}
