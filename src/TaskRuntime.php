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
}
