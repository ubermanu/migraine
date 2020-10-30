<?php
declare(strict_types=1);

namespace Migraine\Configuration\Yaml\Processor;

use Migraine\Processor\AbstractProcessor;
use Migraine\Processor\FunctionProcessor;

/**
 * Class FunctionProcessor
 * @package Migraine\Configuration\Yaml\Processor
 */
class FunctionProcessorFactory extends AbstractProcessorFactory
{
    /**
     * @var string
     */
    protected string $processorType = FunctionProcessor::class;

    /**
     * @inheritDoc
     */
    public function create(): AbstractProcessor
    {
        $processor = new $this->processorType();
        $processor->setFunction($this->options['function']);

        $parameters = $this->options;
        unset($parameters['function']);
        $processor->setParameters($parameters);

        return $processor;
    }
}
