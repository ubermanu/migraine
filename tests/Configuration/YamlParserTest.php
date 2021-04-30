<?php
declare(strict_types=1);

namespace Migraine\Tests\Configuration;

use Migraine\Configuration\YamlParser;
use Migraine\Exception\ErrorException;
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
     * @param string $filename
     * @return YamlParser
     * @throws StorageException
     * @throws TaskException
     */
    protected function createParser(string $filename): YamlParser
    {
        $parser = new YamlParser(file_get_contents(__DIR__ . '/Fixtures/' . $filename));
        return $parser->parse();
    }

    /**
     * @throws StorageException
     * @throws TaskException
     */
    public function testCanParseEmptyTask(): void
    {
        $migraine = $this->createParser('01-empty-task.yml')->getMigraine();

        $this->assertCount(1, $migraine->getTasks());
        $this->assertArrayHasKey('default', $migraine->getTasks());
    }

    /**
     * @throws StorageException
     * @throws TaskException
     */
    public function testCanThrowErrorFromConfig(): void
    {
        $migraine = $this->createParser('02-error-processor.yml')->getMigraine();

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
        $migraine = $this->createParser('03-json-reader.yml')->getMigraine();
        $r = $migraine->execute();

        $this->assertCount(3, $r->getDefaultStorage());
    }

    /**
     * @throws StorageException
     * @throws TaskException
     */
    public function testUnsupportedVersion(): void
    {
        $parser = $this->createParser('04-unsupported-version.yml');
        $migraine = $parser->getMigraine();

        $this->assertFalse($migraine->supports($parser->getRequiredVersion()));
    }
}
