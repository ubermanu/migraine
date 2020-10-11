<?php
declare(strict_types=1);

namespace Migraine\Tests\Processor;

use Migraine\Exception\StorageException;
use Migraine\Exception\TaskException;
use Migraine\Processor\UseProcessor;
use Migraine\Storage;

/**
 * Class UseProcessorTest
 * @package Migraine\Tests\Processor
 */
class UseProcessorTest extends AbstractProcessorTest
{
    /**
     * Creates a new storage and assign it as default.
     *
     * @throws StorageException
     * @throws TaskException
     */
    public function testCanSelectDefaultStorage(): void
    {
        $this->migraine->addStorage('test-foo-bar', new Storage());

        $p = new UseProcessor([
            'use' => 'test-foo-bar',
        ]);

        $this->defaultTask->addProcessor($p);
        $r = $this->migraine->execute('default');

        $this->assertEquals($r->getStorage('test-foo-bar'), $r->getDefaultStorage());
    }
}
