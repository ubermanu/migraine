<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\Exception\StorageException;
use Migraine\Processor\Traits\HasOptionalStorageId;
use Migraine\TaskRuntime;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\OutputInterface;
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
        $format = strtolower($this->format ?? '');

        switch ($format) {
            case 'json':
            {
                echo \json_encode($storage->toArray(), JSON_PRETTY_PRINT);
                break;
            }
            case 'yaml':
            {
                echo Yaml::dump($storage->toArray());
                break;
            }
            default:
            {
                $output = \Migraine\Migraine::getConsoleOutput();
                if ($output instanceof OutputInterface && $storage->size() > 0) {
                    (new Table($output))
                        ->setHeaders($storage->getHeader())
                        ->setRows($storage->toArray())
                        ->render();
                } else {
                    var_dump($storage->toArray());
                }
            }
        }
    }
}
