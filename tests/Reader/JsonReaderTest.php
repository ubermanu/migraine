<?php
declare(strict_types=1);

namespace Migraine\Tests\Reader;

use Migraine\Exception\StorageException;
use Migraine\Exception\TaskException;
use Migraine\Processor\ReadProcessor;

/**
 * Class JsonReaderTest
 * @package Migraine\Tests\Reader
 */
class JsonReaderTest extends AbstractReaderTest
{
    /**
     * @throws StorageException
     * @throws TaskException
     */
    public function testReadFile(): void
    {
        $r = new ReadProcessor();
        $r->setResourceName(__DIR__ . '/Fixtures/example.json');

        $this->defaultTask->addProcessor($r);
        $r = $this->migraine->execute();

        $this->assertEquals(
            [
                ['id' => 0, 'foo' => 'bar'],
                ['id' => 1, 'foo' => 'bar'],
                ['id' => 2, 'foo' => 'bar'],
            ],
            $r->getDefaultStorage()->toArray()
        );
    }
}
