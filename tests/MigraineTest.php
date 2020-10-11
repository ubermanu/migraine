<?php
declare(strict_types=1);

namespace Migraine\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Class MigraineTest
 * @package Migraine\Tests
 */
final class MigraineTest extends TestCase
{
    public function testCanAddTask(): void
    {
        $this->assertInstanceOf(
            Email::class,
            Email::fromString('user@example.com')
        );
    }

    public function testCanNotAddExistingTask(): void
    {
        $this->assertInstanceOf(
            Email::class,
            Email::fromString('user@example.com')
        );
    }
}
