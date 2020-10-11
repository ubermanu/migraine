<?php
declare(strict_types=1);

namespace Migraine;

use Migraine\Processor\AbstractProcessor;

/**
 * Class Task
 * @package Migraine
 */
class Task
{
    /**
     * @var AbstractProcessor[]
     */
    protected array $processors = [];

    /**
     * @param AbstractProcessor $processor
     * @return $this
     */
    public function addProcessor(AbstractProcessor $processor): Task
    {
        $this->processors[] = $processor;
        return $this;
    }

    /**
     * @return AbstractProcessor[]
     */
    public function getProcessors(): array
    {
        return $this->processors;
    }

    /**
     * @inheritdoc
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        foreach ($this->processors as $processor) {
            $processor->execute($taskRuntime);
        }
    }
}
