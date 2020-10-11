<?php
declare(strict_types=1);

namespace Migraine\Tests\Writer;

use Migraine\Processor\WriteProcessor;

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
        $w = new WriteProcessor();
        $w->setResourceName($this->tempDir . '/file.json');

        $this->defaultTask->addProcessor($w);
        $this->migraine->execute();
    }
}
