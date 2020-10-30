<?php
declare(strict_types=1);

namespace Migraine\Tests\Reader;

use Migraine\Exception\StorageException;
use Migraine\Exception\TaskException;
use Migraine\Processor\ReadProcessor;

/**
 * Class DatabaseReaderTest
 * @package Migraine\Tests\Reader
 */
class DatabaseReaderTest extends AbstractReaderTest
{
    /**
     * @throws StorageException
     * @throws TaskException
     */
    public function testReadSQLite(): void
    {
        $p = new ReadProcessor();
        $p->setResourceName('sqlite:' . __DIR__ . '/Fixtures/example.sqlite');
        $p->setResourceType('database');
        $p->setResourceOptions(['table' => 'articles']);

        $this->defaultTask->addProcessor($p);
        $r = $this->migraine->execute();

        $this->assertEquals(
            [
                [
                    'id' => 0,
                    'title' => 'John Doe',
                    'hint' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                ]
            ],
            $r->getDefaultStorage()->toArray()
        );
    }
}
