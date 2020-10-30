<?php
declare(strict_types=1);

namespace Migraine\Configuration\Yaml\Processor;

use Migraine\Processor\FilterProcessor;

/**
 * Class FilterProcessor
 * @package Migraine\Configuration\Yaml\Processor
 */
class FilterProcessorFactory extends AbstractProcessorFactory
{
    /**
     * @var string
     */
    protected string $processorType = FilterProcessor::class;

    /**
     * @var array|string[]
     */
    protected array $mapProps = [
        'filter' => 'rule',
        'in' => 'storageId',
    ];
}
