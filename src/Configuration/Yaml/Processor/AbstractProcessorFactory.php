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
     * @var array|null
     */
    protected ?array $options = null;

    /**
     * ErrorProcessor constructor.
     * @param array|null $options
     */
    public function __construct(?array $options)
    {
        $this->options = $options;
    }

    /**
     * @return AbstractProcessor
     */
    abstract public function create(): AbstractProcessor;
}
