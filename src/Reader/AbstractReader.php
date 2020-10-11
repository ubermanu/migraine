<?php
declare(strict_types=1);

namespace Migraine\Reader;

use Migraine\Storage;

/**
 * Class AbstractReader
 * @package Migraine\Reader
 */
abstract class AbstractReader
{
    /**
     * @param string|null $resource
     * @param array $options
     * @return Storage
     */
    public abstract function read(?string $resource, array $options): Storage;
}
