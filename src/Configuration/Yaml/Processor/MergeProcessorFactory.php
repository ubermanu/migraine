<?php
declare(strict_types=1);

namespace Migraine\Configuration\Yaml\Processor;

use Migraine\Processor\MergeProcessor;

/**
 * Class MergeProcessor
 * @package Migraine\Configuration\Yaml\Processor
 */
class MergeProcessorFactory extends AbstractProcessorFactory
{
    /**
     * @var string
     */
    protected string $processorType = MergeProcessor::class;

    /**
     * @var array|string[]
     */
    protected array $mapProps = [
        'merge' => 'storageId',
    ];
}
