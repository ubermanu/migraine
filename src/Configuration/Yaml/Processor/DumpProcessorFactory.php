<?php
declare(strict_types=1);

namespace Migraine\Configuration\Yaml\Processor;

use Migraine\Processor\DumpProcessor;

/**
 * Class DumpProcessor
 * @package Migraine\Configuration\Yaml\Processor
 */
class DumpProcessorFactory extends AbstractProcessorFactory
{
    /**
     * @var string
     */
    protected string $processorType = DumpProcessor::class;

    /**
     * @var array|string[]
     */
    protected array $mapProps = [
        'dump' => 'storageId',
    ];
}
