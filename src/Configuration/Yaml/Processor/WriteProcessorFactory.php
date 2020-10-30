<?php
declare(strict_types=1);

namespace Migraine\Configuration\Yaml\Processor;

use Migraine\Processor\WriteProcessor;

/**
 * Class WriteProcessor
 * @package Migraine\Configuration\Yaml\Processor
 */
class WriteProcessorFactory extends AbstractProcessorFactory
{
    /**
     * @var string
     */
    protected string $processorType = WriteProcessor::class;

    /**
     * @var array|string[]
     */
    protected array $mapProps = [
        'write' => 'resourceName',
        'type' => 'resourceType',
        'options' => 'resourceOptions',
    ];
}
