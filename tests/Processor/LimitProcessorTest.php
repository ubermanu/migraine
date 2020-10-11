<?php
declare(strict_types=1);

namespace Migraine\Tests\Processor;

use Migraine\Exception\StorageException;
use Migraine\Exception\TaskException;
use Migraine\Processor\LimitProcessor;
use Migraine\Storage;

/**
 * Class LimitProcessorTest
 * @package Migraine\Tests\Processor
 */
class LimitProcessorTest extends AbstractProcessorTest
{
    /**
     * @throws StorageException
     * @throws TaskException
     */
    public function testLimitRowsCount(): void
    {
        $data = [
            ['foo' => 1],
            ['foo' => 2],
            ['foo' => 3],
            ['foo' => 4],
        ];

        $this->migraine->addStorage('test', new Storage($data));

        $p = new LimitProcessor();
        $p->setLength(3);
        $p->setStorage('test');

        $this->defaultTask->addProcessor($p);
        $r = $this->migraine->execute();

        $this->assertCount(3, $r->getStorage('test'));
    }
}
