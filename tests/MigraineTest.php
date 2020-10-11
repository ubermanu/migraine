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
    /**
     * @var Migraine
     */
    protected Migraine $migraine;

    protected function setUp(): void
    {
        $this->migraine = new Migraine();
    }

    public function testHasStorageCollection(): void
    {
        $this->assertIsArray($this->migraine->getStorages());
        $this->assertCount(0, $this->migraine->getStorages());
    }

    /**
     * @throws StorageException
     */
    public function testCannotAddExistingStorage(): void
    {
        $this->expectException(StorageException::class);

        $this->migraine->addStorage('test', new Storage());
        $this->migraine->addStorage('test', new Storage());
    }

    public function testHasTaskCollection(): void
    {
        $this->assertIsArray($this->migraine->getTasks());
        $this->assertCount(0, $this->migraine->getTasks());
    }

    public function testCannotAddExistingTask(): void
    {
        $this->expectException(TaskException::class);

        $this->migraine->addTask('default', new Task());
        $this->migraine->addTask('default', new Task());
    }

    /**
     * @doesNotPerformAssertions
     * @throws StorageException
     * @throws TaskException
     */
    public function testCanRunTask(): void
    {
        $this->migraine->addTask('default', new Task());
        $this->migraine->execute('default');
    }
}
