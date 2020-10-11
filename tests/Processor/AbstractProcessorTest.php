<?php
declare(strict_types=1);

namespace Migraine\Tests\Processor;

use Migraine\Exception\TaskException;
use Migraine\Migraine;
use Migraine\Task;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractProcessorTest
 * @package Migraine\Tests\Processor
 */
abstract class AbstractProcessorTest extends TestCase
{
    /**
     * @var Migraine
     */
    protected Migraine $migraine;

    /**
     * @var Task
     */
    protected Task $defaultTask;

    /**
     * @throws TaskException
     */
    protected function setUp(): void
    {
        $this->migraine = new Migraine();
        $this->defaultTask = new Task();
        $this->migraine->addTask('default', $this->defaultTask);
    }
}
