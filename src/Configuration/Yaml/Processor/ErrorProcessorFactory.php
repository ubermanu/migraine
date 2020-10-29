<?php
declare(strict_types=1);

namespace Migraine\Configuration\Yaml\Processor;

use Migraine\Processor\ErrorProcessor;

/**
 * Class ErrorProcessor
 * @package Migraine\Configuration\Yaml\Processor
 */
class ErrorProcessorFactory extends AbstractProcessorFactory
{
    /**
     * @var string
     */
    protected string $processorType = ErrorProcessor::class;

    /**
     * @var array|string[]
     */
    protected array $mapProps = [
        'error' => 'message',
    ];
}
