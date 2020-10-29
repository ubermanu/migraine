<?php
declare(strict_types=1);

namespace Migraine\Configuration;

use Migraine\Exception\StorageException;
use Migraine\Exception\TaskException;
use Migraine\Processor\AbstractProcessor;
use Migraine\Storage;
use Migraine\Task;
use Symfony\Component\Yaml\Tag\TaggedValue;
use Symfony\Component\Yaml\Yaml;

/**
 * Class YamlParser
 * @package Migraine\Configuration
 */
class YamlParser extends AbstractParser
{
    /**
     * @var array
     */
    protected array $configuration;

    /**
     * YamlParser constructor.
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->configuration = Yaml::parse($content, Yaml::PARSE_CUSTOM_TAGS);
        parent::__construct();
    }

    /**
     * @return $this
     * @throws StorageException
     * @throws TaskException
     */
    public function parse(): YamlParser
    {
        foreach ($this->configuration as $identifier => $node) {
            if ($node instanceof TaggedValue) {
                switch ($node->getTag()) {
                    case 'storage':
                        $this->parseStorageTag($identifier, $node->getValue());
                        break;
                    case 'task':
                        $this->parseTaskTag($identifier, $node->getValue());
                        break;
                    default:
                }
            }
        }

        return $this;
    }

    /**
     * @param string $identifier
     * @param array|null $storageData
     * @throws StorageException
     */
    protected function parseStorageTag(string $identifier, ?array $storageData): void
    {
        $storage = new Storage($storageData ?? []);
        $this->migraine->addStorage($identifier, $storage);
    }

    /**
     * @param string $identifier
     * @param array|null $taskConfig
     * @throws TaskException
     */
    protected function parseTaskTag(string $identifier, ?array $taskConfig): void
    {
        $task = new Task();

        if (is_array($taskConfig)) {
            foreach ($taskConfig as $processorConfig) {
                $processor = $this->parseProcessor($processorConfig);
                $task->addProcessor($processor);
            }
        }

        $this->migraine->addTask($identifier, $task);
    }

    /**
     * @param array $processorConfig
     * @return AbstractProcessor
     */
    protected function parseProcessor(array $processorConfig): AbstractProcessor
    {
        $processorType = current(array_keys($processorConfig));

        // TODO: Override by settings
        $factoryClass = '\\Migraine\\Configuration\\Yaml\\Processor\\' . ucfirst($processorType) . 'ProcessorFactory';
        $factory = new $factoryClass($processorConfig);

        return $factory->create();
    }
}
