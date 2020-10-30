<?php
declare(strict_types=1);

namespace Migraine\Configuration\Yaml\Processor;

use Migraine\Processor\SelectProcessor;

/**
 * Class SelectProcessor
 * @package Migraine\Configuration\Yaml\Processor
 */
class SelectProcessorFactory extends AbstractProcessorFactory
{
    /**
     * @var string
     */
    protected string $processorType = SelectProcessor::class;

    /**
     * @var array|string[]
     */
    protected array $mapProps = [
        'select' => 'columns',
        'in' => 'storageId',
    ];
}
