<?php
declare(strict_types=1);

namespace Migraine\Configuration\Yaml\Processor;

use Migraine\Processor\FlushProcessor;

/**
 * Class FlushProcessor
 * @package Migraine\Configuration\Yaml\Processor
 */
class FlushProcessorFactory extends AbstractProcessorFactory
{
    /**
     * @var string
     */
    protected string $processorType = FlushProcessor::class;

    /**
     * @var array|string[]
     */
    protected array $mapProps = [
        'flush' => 'storageId',
    ];
}
