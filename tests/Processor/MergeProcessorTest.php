<?php
declare(strict_types=1);

namespace Migraine\Tests\Processor;

use Migraine\Exception\StorageException;
use Migraine\Exception\TaskException;
use Migraine\Processor\MergeProcessor;
use Migraine\Processor\SelectProcessor;
use Migraine\Storage;

/**
 * Class MergeProcessorTest
 * @package Migraine\Tests\Processor
 */
class MergeProcessorTest extends AbstractProcessorTest
{
    /**
     * @throws StorageException
     * @throws TaskException
     */
    public function testCanMergeMultipleStorages(): void
    {
        $data = [
            ['id' => 1, 'name' => 'John Doe'],
            ['id' => 2, 'name' => 'John Doe'],
        ];

        $this->migraine->addStorage('test-1', new Storage($data));
        $this->migraine->addStorage('test-2', new Storage($data));

        $p = new MergeProcessor();
        $p->setMergingStorageIds(['test-1', 'test-2']);

        $this->defaultTask->addProcessor($p);
        $r = $this->migraine->execute();

        $this->assertCount(2, $r->getStorage('test-1'));
        $this->assertCount(2, $r->getStorage('test-2'));
        $this->assertCount(4, $r->getDefaultStorage());
    }
}
