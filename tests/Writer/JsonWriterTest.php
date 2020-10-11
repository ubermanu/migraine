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
        $r = new TaskRuntime();
        $t = new Task();
        $w = new WriteProcessor();
        $w->setResourceName($this->tempDir . '/file.json');

        $t->addProcessor($w);
        $t->execute($r);
    }
}
