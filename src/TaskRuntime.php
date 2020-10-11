<?php
declare(strict_types=1);

namespace Migraine;

/**
 * Class TaskRuntime
 * @package Migraine
 */
class TaskRuntime
{
    /**
     * @var Migraine
     */
    protected Migraine $migraine;

    /**
     * TaskRuntime constructor.
     * @param Migraine $migraine
     */
    public function __construct(Migraine $migraine)
    {
        $this->migraine = $migraine;
    }

    public function execute()
    {
//        $this->migraine->getTasks()

//        if (empty(tasks[$taskName])) {
//            throw new Exception(sprintf('The task "%s" does not exist!', $taskName));
//        }
    }
}
