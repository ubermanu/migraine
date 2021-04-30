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
     * Add a new processor to the list.
     *
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
     * Run the task processors.
     *
     * @param TaskRuntime $taskRuntime
     * @return $this
     */
    public function execute(TaskRuntime $taskRuntime): Task
    {
        foreach ($this->processors as $processor) {
            $taskRuntime->getLogger()?->debug(sprintf('Execute %s %s', get_class($processor), $processor));
            $processor->execute($taskRuntime);
        }

        return $this;
    }
}
