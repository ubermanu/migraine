<?php
declare(strict_types=1);

namespace Migraine\Tests;

use Migraine\Exception\StorageException;
use Migraine\Exception\TaskException;
use Migraine\Migraine;
use Migraine\Storage;
use Migraine\Task;
use Migraine\TaskRuntime;
use PHPUnit\Framework\TestCase;

/**
 * Class TaskRuntimeTest
 * @package Migraine\Tests
 */
final class TaskRuntimeTest extends TestCase
{
    public function testCanCreateTaskRuntime(): void
    {
        $r = $this->createMock(TaskRuntime::class);

        $this->assertCount(0, $r->getTasks());
        $this->assertCount(0, $r->getStorages());
    }

    public function testHasDefaultStorage(): void
    {
        $m = new Migraine();
        $r = new TaskRuntime($m);

        $this->assertCount(1, $r->getStorages());
        $this->assertInstanceOf(Storage::class, $r->getDefaultStorage());
        $this->assertCount(0, $r->getDefaultStorage());
    }
}
