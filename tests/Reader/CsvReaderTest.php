<?php
declare(strict_types=1);

namespace Migraine\Tests\Reader;

use Migraine\Exception\StorageException;
use Migraine\Exception\TaskException;
use Migraine\Processor\ReadProcessor;

/**
 * Class CsvReaderTest
 * @package Migraine\Tests\Reader
 */
class CsvReaderTest extends AbstractReaderTest
{
    /**
     * @throws StorageException
     * @throws TaskException
     */
    public function testReadFile(): void
    {
        $r = new ReadProcessor();
        $r->setResourceName(__DIR__ . '/Fixtures/example.csv');

        $this->defaultTask->addProcessor($r);
        $r = $this->migraine->execute();

        $this->assertEquals(
            [
                ['id' => 0, 'foo' => 'bar,hello'],
                ['id' => 1, 'foo' => 'bar test'],
                ['id' => 2, 'foo' => 'bar csv'],
            ],
            $r->getDefaultStorage()->toArray()
        );
    }

    /**
     * @throws StorageException
     * @throws TaskException
     */
    public function testReadWithCustomOptions(): void
    {
        $r = new ReadProcessor();
        $r->setResourceName(__DIR__ . '/Fixtures/example-2.csv');
        $r->setResourceOptions([
            'delimiter' => ';',
            'enclosure' => "'",
        ]);

        $this->defaultTask->addProcessor($r);
        $r = $this->migraine->execute();

        $this->assertEquals(
            [
                ['id' => '0', 'foo' => 'bar bar'],
            ],
            $r->getDefaultStorage()->toArray()
        );
    }
}
