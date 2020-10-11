<?php
declare(strict_types=1);

namespace Migraine\Tests;

use Migraine\Exception\StorageException;
use Migraine\Migraine;
use Migraine\Storage;
use PHPUnit\Framework\TestCase;

/**
 * Class StorageCollectionTest
 * @package Migraine\Tests
 */
final class StorageCollectionTest extends TestCase
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
}
