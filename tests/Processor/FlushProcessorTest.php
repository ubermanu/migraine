<?php
declare(strict_types=1);

namespace Migraine\Tests\Processor;

use Migraine\Exception\StorageException;
use Migraine\Exception\TaskException;
use Migraine\Processor\FlushProcessor;
use Migraine\Storage;

/**
 * Class FlushProcessorTest
 * @package Migraine\Tests\Processor
 */
class FlushProcessorTest extends AbstractProcessorTest
{
    /**
     * @throws StorageException
     * @throws TaskException
     */
    public function testEmptyStorage(): void
    {
        $data = [
            [
                'foo' => 'bar',
            ]
        ];

        $this->migraine->addStorage('test', new Storage($data));

        $p = new FlushProcessor([
            'flush' => 'test',
        ]);

        $this->defaultTask->addProcessor($p);
        $r = $this->migraine->execute();

        $this->assertCount(0, $r->getStorage('test'));
    }
}
