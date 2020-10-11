<?php
declare(strict_types=1);

namespace Migraine\Tests\Configuration;

use Migraine\Configuration\YamlParser;
use Migraine\Exception\StorageException;
use Migraine\Exception\TaskException;
use PHPUnit\Framework\TestCase;

/**
 * Class YamlParserTest
 * @package Migraine\Tests\Configuration
 */
class YamlParserTest extends TestCase
{
    /**
     * @throws StorageException
     * @throws TaskException
     */
    public function testCanParseEmptyTask(): void
    {
        $parser = new YamlParser(file_get_contents(__DIR__ . '/Fixtures/01-default-task.yml'));
        $migraine = $parser->parse()->getMigraine();

        $this->assertCount(1, $migraine->getTasks());
        $this->assertArrayHasKey('default', $migraine->getTasks());
    }
}
