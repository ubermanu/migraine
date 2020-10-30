<?php
declare(strict_types=1);

namespace Migraine\Configuration\Yaml\Processor;

use Migraine\Processor\IfProcessor;

/**
 * Class IfProcessor
 * @package Migraine\Configuration\Yaml\Processor
 */
class IfProcessorFactory extends AbstractProcessorFactory
{
    /**
     * @var string
     */
    protected string $processorType = IfProcessor::class;

    /**
     * @var array|string[]
     */
    protected array $mapProps = [
        'if' => 'condition',
    ];
}
