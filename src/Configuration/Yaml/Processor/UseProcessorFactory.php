<?php
declare(strict_types=1);

namespace Migraine\Configuration\Yaml\Processor;

use Migraine\Processor\UseProcessor;

/**
 * Class UseProcessor
 * @package Migraine\Configuration\Yaml\Processor
 */
class UseProcessorFactory extends AbstractProcessorFactory
{
    /**
     * @var string
     */
    protected string $processorType = UseProcessor::class;

    /**
     * @var array|string[]
     */
    protected array $mapProps = [
        'use' => 'storageId',
    ];
}
