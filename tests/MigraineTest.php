<?php
declare(strict_types=1);

namespace Migraine\Tests;

use Migraine\Exception\StorageException;
use Migraine\Exception\TaskException;
use Migraine\Migraine;
use Migraine\Storage;
use Migraine\Task;
use PHPUnit\Framework\TestCase;

/**
 * Class MigraineTest
 * @package Migraine\Tests
 */
final class MigraineTest extends TestCase
{
    public function testHasStorageCollection(): void
    {
        $m = new Migraine();

        $this->assertIsArray($m->getStorages());
    }

    public function testCannotAddExistingStorage(): void
    {
        $m = new Migraine();
        $s = new Storage();

        $this->expectException(StorageException::class);

        $m->addStorage('test', $s);
        $m->addStorage('test', $s);
    }

    public function testHasDefaultStorage(): void
    {
        $m = new Migraine();

        $this->assertCount(1, $m->getStorages());
        $this->assertInstanceOf(Storage::class, $m->getDefaultStorage());
    }

    public function testHasTaskCollection(): void
    {
        $m = new Migraine();

        $this->assertIsArray($m->getTasks());
        $this->assertCount(0, $m->getTasks());
    }

    public function testCannotAddExistingTask(): void
    {
        $m = new Migraine();
        $t = new Task();

        $this->expectException(TaskException::class);

        $m->addTask('default', $t);
        $m->addTask('default', $t);
    }

    /**
     * @doesNotPerformAssertions
     * @throws TaskException
     */
    public function testCanRunTask(): void
    {
        $m = new Migraine();
        $t = new Task();

        $m->addTask('default', $t);
        $m->execute('default');
    }
}
