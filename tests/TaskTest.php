<?php
declare(strict_types=1);

namespace Migraine\Tests;

use Migraine\Processor\AbstractProcessor;
use Migraine\Task;
use PHPUnit\Framework\TestCase;

/**
 * Class TaskTest
 * @package Migraine\Tests
 */
final class TaskTest extends TestCase
{
    public function testCanAddProcessor(): void
    {
        $t = new Task();
        $p = $this->createMock(AbstractProcessor::class);

        $t->addProcessor($p);
        $t->addProcessor($p);
        $t->addProcessor($p);
        $t->addProcessor($p);

        $this->assertCount(4, $t->getProcessors());
    }
}
