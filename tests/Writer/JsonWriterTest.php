<?php
declare(strict_types=1);

namespace Migraine\Tests\Writer;

use Migraine\Processor\WriteProcessor;
use Migraine\Task;
use Migraine\TaskRuntime;

/**
 * Class JsonWriterTest
 * @package Migraine\Tests\Processor
 */
class JsonWriterTest extends AbstractWriterTest
{
    /**
     * @doesNotPerformAssertions
     */
    public function testWriteFile(): void
    {
        $options = [
            'write' => $this->tempDir . '/file.json',
        ];

        $r = new TaskRuntime();
        $t = new Task();
        $w = new WriteProcessor($options);
        $t->addProcessor($w);
        $t->execute($r);
    }
}
