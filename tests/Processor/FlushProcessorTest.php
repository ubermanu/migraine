<?php
declare(strict_types=1);

namespace Migraine\Tests\Processor;

use Migraine\Processor\FlushProcessor;
use Migraine\Storage;
use Migraine\TaskRuntime;

/**
 * Class FlushProcessorTest
 * @package Migraine\Tests\Processor
 */
class FlushProcessorTest extends AbstractProcessorTest
{
    /**
     * Test if a storage can be emptied.
     */
    public function testEmptyStorage(): void
    {
        $storage = new Storage([
            ['foo' => 'bar'],
            ['foo' => 'bar'],
            ['foo' => 'bar'],
            ['foo' => 'bar'],
            ['foo' => 'bar'],
            ['foo' => 'bar'],
            ['foo' => 'bar'],
        ]);

        $processor = new FlushProcessor();
        $processor->setStorage($storage);

        $this->assertCount(7, $storage);
        $processor->execute(new TaskRuntime());
        $this->assertCount(0, $storage);
    }
}
