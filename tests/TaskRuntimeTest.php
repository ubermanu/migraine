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
    public function testHasDefaultStorage(): void
    {
        $r = new TaskRuntime();

        $this->assertCount(1, $r->getStorages());
        $this->assertInstanceOf(Storage::class, $r->getDefaultStorage());
        $this->assertCount(0, $r->getDefaultStorage());
    }
}
