<?php
declare(strict_types=1);

namespace Migraine\Tests\Writer;

use Migraine\Tests\Processor\AbstractProcessorTest;

/**
 * Class AbstractWriterTest
 * @package Migraine\Tests\Writer
 */
abstract class AbstractWriterTest extends AbstractProcessorTest
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
        parent::setUp();
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
