<?php
declare(strict_types=1);

namespace Migraine\Tests\Processor;

use Migraine\Exception\StorageException;
use Migraine\Exception\TaskException;
use Migraine\Processor\MapProcessor;
use Migraine\Storage;

/**
 * Class MapProcessorTest
 * @package Migraine\Tests\Processor
 */
class MapProcessorTest extends AbstractProcessorTest
{
    /**
     * @throws StorageException
     * @throws TaskException
     */
    public function testRenameTwoColumnNames(): void
    {
        $data = [
            ['id' => 1, 'name' => 'John Doe'],
        ];

        $this->migraine->addStorage('test', new Storage($data));

        $p = new MapProcessor();
        $p->setMapping([
            'id' => 'userId',
            'name' => 'firstName',
        ]);
        $p->setStorage('test');

        $this->defaultTask->addProcessor($p);
        $r = $this->migraine->execute();

        $this->assertEquals(
            [
                ['userId' => 1, 'firstName' => 'John Doe']
            ],
            $r->getStorage('test')->toArray()
        );
    }
}
