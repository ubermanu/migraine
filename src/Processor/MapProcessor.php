<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\TaskRuntime;

/**
 * Class MapProcessor
 *
 * @method array getMapping()
 * @method $this setMapping(array $mapping)
 * @method string getStorage()
 * @method $this setStorage(string $storage)
 *
 * @package Migraine\Processor
 */
class MapProcessor extends AbstractProcessor
{
    /**
     * @var array
     */
    protected array $data = [
        'mapping' => null,
        'storage' => null,
    ];

    /**
     * @inheritdoc
     * @throws StorageException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $storage = $this->getStorageOrDefault($taskRuntime, 'storage');

        foreach ($storage as &$record) {

            // Backup current record
            $baseRecord = $record;

            // Apply mapping
            foreach ($this->getMapping() as $key => $newKey) {
                if (array_key_exists($key, $baseRecord)) {
                    $record[$newKey] = $baseRecord[$key];
                    if ($key !== $newKey) {
                        unset($record[$key]);
                    }
                }
            }
        }
    }
}
