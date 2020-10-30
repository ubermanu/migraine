---
to: tests/Reader/<%= Name %>ReaderTest.php
---
<?php
declare(strict_types=1);

namespace Migraine\Tests\Reader;

use Migraine\Exception\StorageException;
use Migraine\Exception\TaskException;
use Migraine\Processor\ReadProcessor;

/**
 * Class <%= Name %>ReaderTest
 * @package Migraine\Tests\Reader
 */
class <%= Name %>ReaderTest extends AbstractReaderTest
{
    /**
     * @throws StorageException
     * @throws TaskException
     */
    public function testReadFile(): void
    {
        $p = new ReadProcessor();
        $p->setResourceName(__DIR__ . '/Fixtures/example.<%= name %>');

        $this->defaultTask->addProcessor($p);
        $r = $this->migraine->execute();

        $this->assertEquals(
            [
            ],
            $r->getDefaultStorage()->toArray()
        );
    }
}
