<?php
declare(strict_types=1);

namespace Migraine\Configuration;

use Migraine\Migraine;
use Symfony\Component\Yaml\Yaml;

/**
 * Class YamlParser
 * @package Migraine\Configuration
 */
class YamlParser
{
    /**
     * @var string
     */
    protected string $configuration = '';

    /**
     * @var Migraine
     */
    protected Migraine $migraine;

    /**
     * YamlParser constructor.
     * @param string $configuration
     */
    public function __construct(string $configuration)
    {
        $this->configuration = Yaml::parseFile($configuration);
        $this->migraine = new Migraine();
    }

    /**
     * @return $this
     */
    public function parse(): YamlParser
    {
        // TODO: Parse configuration content with TagResolver
        return $this;
    }

    /**
     * @return Migraine
     */
    public function getMigraine(): Migraine
    {
        return $this->migraine;
    }
}
