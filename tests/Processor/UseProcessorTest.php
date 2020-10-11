<?php
declare(strict_types=1);

namespace Migraine\Tests\Processor;

use Migraine\Migraine;
use Migraine\Processor\UseProcessor;
use Migraine\Storage;
use Migraine\Task;
use PHPUnit\Framework\TestCase;

/**
 * Class UseProcessorTest
 * @package Migraine\Tests\Processor
 */
class UseProcessorTest extends TestCase
{
    /**
     * Creates a new storage and assign it as default.
     *
     * @throws \Migraine\Exception\StorageException
     * @throws \Migraine\Exception\TaskException
     */
    public function testCanSelectDefaultStorage(): void
    {
        $m = new Migraine();

        $s = new Storage();
        $m->addStorage('test-foo-bar', $s);

        $t = new Task();
        $m->addTask('default', $t);

        $p = new UseProcessor([
            'use' => 'test-foo-bar',
        ]);
        $t->addProcessor($p);

        $r = $m->execute('default');
        $this->assertEquals($r->getStorage('test-foo-bar'), $r->getDefaultStorage());
    }
}
