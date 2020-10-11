<?php
declare(strict_types=1);

namespace Migraine\Tests\Processor;

use Migraine\Exception\ErrorException;
use Migraine\Exception\StorageException;
use Migraine\Exception\TaskException;
use Migraine\Processor\ErrorProcessor;

/**
 * Class ErrorProcessorTest
 * @package Migraine\Tests\Processor
 */
class ErrorProcessorTest extends AbstractProcessorTest
{
    /**
     * Throws a custom exception.
     *
     * @throws StorageException
     * @throws TaskException
     */
    public function testCanThrowErrorWithCustomMessage(): void
    {
        $p = new ErrorProcessor([
            'error' => 'Error has been thrown!',
        ]);

        $this->expectException(ErrorException::class);
        $this->expectExceptionMessage('Error has been thrown!');

        $this->defaultTask->addProcessor($p);
        $this->migraine->execute('default');
    }
}
