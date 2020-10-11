<?php
declare(strict_types=1);

namespace Migraine\Tests\Processor;

use Migraine\Exception\StorageException;
use Migraine\Exception\TaskException;
use Migraine\Processor\FilterProcessor;
use Migraine\Storage;

/**
 * Class FilterProcessorTest
 * @package Migraine\Tests\Processor
 */
class FilterProcessorTest extends AbstractProcessorTest
{
    /**
     * @throws StorageException
     * @throws TaskException
     */
    public function testIntegerValues(): void
    {
        $data = [
            ['foo' => 1],
            ['foo' => 2],
            ['foo' => 3],
            ['foo' => 4],
        ];

        $this->migraine->addStorage('test', new Storage($data));

        $p = new FilterProcessor([
            'filter' => 'foo > 2',
            'in' => 'test',
        ]);

        $this->defaultTask->addProcessor($p);
        $r = $this->migraine->execute();

        $this->assertCount(2, $r->getStorage('test'));
    }
}
