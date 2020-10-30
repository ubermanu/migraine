<?php
declare(strict_types=1);

namespace Migraine\Configuration\Yaml\Processor;

use Migraine\Processor\ReadProcessor;

/**
 * Class ReadProcessor
 * @package Migraine\Configuration\Yaml\Processor
 */
class ReadProcessorFactory extends AbstractProcessorFactory
{
    /**
     * @var string
     */
    protected string $processorType = ReadProcessor::class;

    /**
     * @var array|string[]
     */
    protected array $mapProps = [
        'read' => 'resourceName',
        'type' => 'resourceType',
        'options' => 'resourceOptions',
    ];
}
