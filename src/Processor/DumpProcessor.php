<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\Processor\Traits\HasOptionalStorageId;
use Migraine\TaskRuntime;
use Symfony\Component\Yaml\Yaml;

/**
 * Class DumpProcessor
 * @package Migraine\Processor
 */
class DumpProcessor extends AbstractProcessor
{
    use HasOptionalStorageId;

    /**
     * @Migraine\Configuration\Yaml\Option("dump")
     * @var string|null
     */
    protected ?string $storageId = null;

    /**
     * @var string|null
     */
    protected ?string $format = null;

    /**
     * @inheritDoc
     * @throws StorageException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $storage = $this->getStorageOrDefault($taskRuntime, $this->getStorageId());

        switch (strtolower($this->getFormat())) {
            case 'yaml':
            {
                $this->output(Yaml::dump($storage->toArray()));
                break;
            }
            case 'json':
            {
                $this->output(\json_encode($storage->toArray(), JSON_PRETTY_PRINT));
                break;
            }
            default:
            {
                var_dump($storage->toArray());
            }
        }
    }

    /**
     * @param string|null $format
     */
    public function setFormat(?string $format): void
    {
        $this->format = $format;
    }

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format ?? '';
    }

    /**
     * @param string|null $message
     */
    protected function output(?string $message): void
    {
        if (is_string($message)) {
            echo $message . PHP_EOL;
        }
    }
}
