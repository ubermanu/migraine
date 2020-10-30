<?php
declare(strict_types=1);

namespace Migraine\Configuration\Yaml\Processor;

use Migraine\Processor\LimitProcessor;

/**
 * Class LimitProcessor
 * @package Migraine\Configuration\Yaml\Processor
 */
class LimitProcessorFactory extends AbstractProcessorFactory
{
    /**
     * @var string
     */
    protected string $processorType = LimitProcessor::class;

    /**
     * @var array|string[]
     */
    protected array $mapProps = [
        'limit' => 'length',
        'in' => 'storageId',
    ];
}
