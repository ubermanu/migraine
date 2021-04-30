<?php
declare(strict_types=1);

namespace Migraine\Configuration;

use Migraine\Migraine;

/**
 * Class AbstractParser
 * @package Migraine\Configuration
 */
abstract class AbstractParser
{
    /**
     * @var Migraine
     */
    protected Migraine $migraine;

    /**
     * @return $this
     */
    public abstract function parse(): AbstractParser;

    /**
     * @return string
     */
    abstract public function getRequiredVersion(): string;

    /**
     * @return Migraine
     */
    public function getMigraine(): Migraine
    {
        return $this->migraine;
    }
}
