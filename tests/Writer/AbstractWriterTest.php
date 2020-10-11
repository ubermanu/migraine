<?php
declare(strict_types=1);

namespace Migraine\Tests\Writer;

use PHPUnit\Framework\TestCase;

/**
 * Class AbstractWriterTest
 * @package Migraine\Tests\Writer
 */
abstract class AbstractWriterTest extends TestCase
{
    /**
     * @var string
     */
    protected string $tempDir = '.phpunit-tmp';

    /**
     * @inheritDoc
     */
    public function setUp(): void
    {
        @mkdir($this->tempDir);
    }

    /**
     * @inheritDoc
     */
    protected function tearDown(): void
    {
        @rmdir($this->tempDir);
    }
}
