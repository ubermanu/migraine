<?php
declare(strict_types=1);

namespace Migraine\Tests\Configuration;

use Migraine\Configuration\YamlParser;
use Migraine\Exception\ErrorException;
use Migraine\Exception\StorageException;
use Migraine\Exception\TaskException;
use Migraine\Migraine;
use PHPUnit\Framework\TestCase;

/**
 * Class YamlParserTest
 * @package Migraine\Tests\Configuration
 */
class YamlParserTest extends TestCase
{
    /**
     * @param string $filename
     * @return Migraine
     * @throws StorageException
     * @throws TaskException
     */
    protected function createMigraine(string $filename): Migraine
    {
        $parser = new YamlParser(file_get_contents(__DIR__ . '/Fixtures/' . $filename));
        return $parser->parse()->getMigraine();
    }

    /**
     * @throws StorageException
     * @throws TaskException
     */
    public function testCanParseEmptyTask(): void
    {
        $migraine = $this->createMigraine('01-empty-task.yml');

        $this->assertCount(1, $migraine->getTasks());
        $this->assertArrayHasKey('default', $migraine->getTasks());
    }

    /**
     * @throws StorageException
     * @throws TaskException
     */
    public function testCanThrowErrorFromConfig(): void
    {
        $migraine = $this->createMigraine('02-error-processor.yml');

        $this->expectException(ErrorException::class);
        $this->expectExceptionMessage('An error has been thrown!');
        $this->expectExceptionCode(1602454024);

        $migraine->execute();
    }

    /**
     * @throws StorageException
     * @throws TaskException
     */
    public function testCanReadJson(): void
    {
        $migraine = $this->createMigraine('03-json-reader.yml');
        $r = $migraine->execute();

        $this->assertCount(3, $r->getDefaultStorage());
    }
}
