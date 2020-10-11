<?php
declare(strict_types=1);

namespace Migraine\Tests;

use Migraine\Storage;
use PHPUnit\Framework\TestCase;

/**
 * Class StorageTest
 * @package Migraine\Tests
 */
final class StorageTest extends TestCase
{
    public function testIsEmptyArrayObject(): void
    {
        $s = new Storage();

        $this->assertInstanceOf(\ArrayObject::class, $s);
        $this->assertEquals(0, $s->count());
    }

    public function testEmptyStorage(): void
    {
        $data = [
            [
                'foo' => 'bar',
            ]
        ];

        $s = new Storage($data);
        $s->flush();

        $this->assertEquals(0, $s->count());
    }

    public function testCopyStorage(): void
    {
        $data = [
            [
                'foo' => 'bar',
            ]
        ];

        $s = new Storage($data);
        $sCopy = new Storage();

        $sCopy->copy($s);

        $this->assertEquals(
            $data,
            $sCopy->toArray()
        );
    }

    public function testGetHeader(): void
    {
        $data = [
            [
                'foo' => 'bar',
            ]
        ];

        $s = new Storage($data);

        $this->assertEquals(
            [
                'foo',
            ],
            $s->getHeader()
        );
    }

    public function testCombineHeaderAndValues(): void
    {
        $header = [
            'firstname',
            'lastname',
        ];

        $values = [
            [
                'john',
                'doe',
            ],
        ];

        $s = Storage::combine($header, $values);

        $this->assertEquals(
            [
                [
                    'firstname' => 'john',
                    'lastname' => 'doe',
                ]
            ],
            $s->toArray()
        );
    }
}
