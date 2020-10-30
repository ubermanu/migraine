<?php
declare(strict_types=1);

namespace Migraine\Tests\Reader;

use Migraine\Exception\StorageException;
use Migraine\Exception\TaskException;
use Migraine\Processor\ReadProcessor;

/**
 * Class XmlReaderTest
 * @package Migraine\Tests\Reader
 */
class XmlReaderTest extends AbstractReaderTest
{
    /**
     * @throws StorageException
     * @throws TaskException
     */
    public function testReadFile(): void
    {
        $p = new ReadProcessor();
        $p->setResourceName(__DIR__ . '/Fixtures/example-sitemap.xml');

        $this->defaultTask->addProcessor($p);
        $r = $this->migraine->execute();

        $this->assertEquals(
            [
                [
                    'loc' => 'http://example.com/index.php',
                    'lastmod' => '2005-01-01',
                    'changefreq' => 'monthly',
                    'priority' => '0.5',
                ],
                [
                    'loc' => 'http://test.com/',
                    'lastmod' => '2020-10-30',
                    'changefreq' => 'daily',
                    'priority' => '1.0',
                ],
            ],
            $r->getDefaultStorage()->toArray()
        );
    }
}
