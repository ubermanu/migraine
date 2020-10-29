<?php
declare(strict_types=1);

namespace Migraine\Configuration\Yaml\Processor;

use Migraine\Processor\AbstractProcessor;

/**
 * Class AbstractProcessorFactory
 * @package Migraine\Configuration\Yaml\Processor
 */
abstract class AbstractProcessorFactory
{
    /**
     * @var string
     */
    protected string $processorType;

    /**
     * The options available from the parsed configuration.
     * The first item key is considered as the processor name.
     * @see \Migraine\Configuration\YamlParser
     *
     * @var array|null
     */
    protected ?array $options = null;

    /**
     * Used to forward certain configuration option,
     * to another processor property.
     *
     * @var string[]
     */
    protected array $mapProps = [];

    /**
     * ErrorProcessor constructor.
     * @param array|null $options
     */
    public function __construct(?array $options)
    {
        $this->options = $options;
    }

    /**
     * Returns an array of properties (with their values)
     * to apply to the processor.
     *
     * @return array
     */
    protected function getMappedProperties(): array
    {
        $properties = $this->options ?? [];

        foreach ($properties as $option => $value) {
            if (array_key_exists($option, $this->mapProps)) {
                $prop = $this->mapProps[$option];
                $properties[$prop] = $value;
            } else {
                $properties[$option] = $value;
            }
        }

        return $properties;
    }

    /**
     * @return AbstractProcessor
     */
    public function create(): AbstractProcessor
    {
        $processor = new $this->processorType();

        // Apply property values from config options
        foreach ($this->getMappedProperties() as $prop => $value) {
            $processor->{'set' . ucfirst($prop)}($value);
        }

        return $processor;
    }
}
