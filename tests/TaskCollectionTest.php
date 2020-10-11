<?php
declare(strict_types=1);

namespace Migraine\Tests;

use Migraine\Exception\TaskException;
use Migraine\Migraine;
use Migraine\Task;
use PHPUnit\Framework\TestCase;

/**
 * Class TaskCollectionTest
 * @package Migraine\Tests
 */
final class TaskCollectionTest extends TestCase
{
    public function testHasTaskCollection(): void
    {
        $m = new Migraine();
        $this->assertIsArray($m->getTasks());
        $this->assertCount(0, $m->getTasks());
    }

    public function testCannotAddExistingTask(): void
    {
        $m = new Migraine();
        $s = new Task();

        $this->expectException(TaskException::class);

        $m->addTask('default', $s);
        $m->addTask('default', $s);
    }
}
