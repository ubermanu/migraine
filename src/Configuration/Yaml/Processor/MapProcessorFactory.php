<?php
declare(strict_types=1);

namespace Migraine\Configuration\Yaml\Processor;

use Migraine\Processor\MapProcessor;

/**
 * Class MapProcessor
 * @package Migraine\Configuration\Yaml\Processor
 */
class MapProcessorFactory extends AbstractProcessorFactory
{
    /**
     * @var string
     */
    protected string $processorType = MapProcessor::class;

    /**
     * @var array|string[]
     */
    protected array $mapProps = [
        'map' => 'mapping',
        'in' => 'storageId',
    ];
}
