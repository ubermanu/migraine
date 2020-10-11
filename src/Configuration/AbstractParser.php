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
     * AbstractParser constructor.
     */
    public function __construct()
    {
        $this->migraine = new Migraine();
    }

    /**
     * @return $this
     */
    public abstract function parse();

    /**
     * @return Migraine
     */
    public function getMigraine(): Migraine
    {
        return $this->migraine;
    }
}
