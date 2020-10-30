<?php
declare(strict_types=1);

namespace Migraine\Configuration\Yaml\Processor;

use Migraine\Processor\TaskProcessor;

/**
 * Class TaskProcessor
 * @package Migraine\Configuration\Yaml\Processor
 */
class TaskProcessorFactory extends AbstractProcessorFactory
{
    /**
     * @var string
     */
    protected string $processorType = TaskProcessor::class;

    /**
     * @var array|string[]
     */
    protected array $mapProps = [
        'task' => 'taskId',
    ];
}
