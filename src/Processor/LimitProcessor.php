<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\TaskRuntime;

/**
 * Class LimitProcessor
 *
 * @method int getLength()
 * @method $this setLength(int $length)
 * @method string getStorage()
 * @method $this setStorage(string $storage)
 *
 * @package Migraine\Processor
 */
class LimitProcessor extends AbstractProcessor
{
    /**
     * @var array
     */
    protected array $data = [
        'length' => 0,
        'storage' => null,
    ];

    /**
     * @inheritdoc
     * @throws StorageException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $this->getStorageOrDefault($taskRuntime, 'storage')->slice(0, $this->getLength());
    }
}
