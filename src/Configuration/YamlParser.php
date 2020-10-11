<?php
declare(strict_types=1);

namespace Migraine\Configuration;

use Symfony\Component\Yaml\Yaml;

/**
 * Class YamlParser
 * @package Migraine\Configuration
 */
class YamlParser extends AbstractParser
{
    /**
     * @var array
     */
    protected array $configuration;

    /**
     * YamlParser constructor.
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->configuration = Yaml::parse($content, Yaml::PARSE_CUSTOM_TAGS);
        parent::__construct();
    }

    /**
     * @return $this
     */
    public function parse(): YamlParser
    {
        // TODO: Parse configuration content with TagResolver
        return $this;
    }
}
