<?php
declare(strict_types=1);

namespace Migraine\Tests\Processor;

use Migraine\Exception\StorageException;
use Migraine\Exception\TaskException;
use Migraine\Processor\SelectProcessor;
use Migraine\Storage;

/**
 * Class SelectProcessorTest
 * @package Migraine\Tests\Processor
 */
class SelectProcessorTest extends AbstractProcessorTest
{
    /**
     * @throws StorageException
     * @throws TaskException
     */
    public function testCustomColumnSelection(): void
    {
        $data = [
            ['id' => 1, 'name' => 'John Doe'],
            ['id' => 2, 'name' => 'John Doe'],
            ['id' => 3, 'name' => 'John Doe'],
            ['id' => 4, 'name' => 'John Doe'],
        ];

        $this->migraine->addStorage('test', new Storage($data));

        $p = new SelectProcessor();
        $p->setColumns(['id']);
        $p->setStorageId('test');

        $this->defaultTask->addProcessor($p);
        $r = $this->migraine->execute();

        $this->assertCount(4, $r->getStorage('test'));
        $this->assertCount(1, $r->getStorage('test')->getHeader());
    }
}
