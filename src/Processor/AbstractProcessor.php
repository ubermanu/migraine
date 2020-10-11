<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\TaskRuntime;

/**
 * Class AbstractProcessor
 * @package Migraine\Processor
 */
abstract class AbstractProcessor
{
    /**
     * @var array
     */
    protected array $options;

    /**
     * AbstractProcessor constructor.
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    /**
     * Execute the
     * @param TaskRuntime $taskRuntime
     * @return mixed
     */
    public abstract function execute(TaskRuntime $taskRuntime);
}
