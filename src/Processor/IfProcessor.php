<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Hoa\Ruler\Context;
use Hoa\Ruler\Ruler;
use Migraine\Exception\StorageException;
use Migraine\Exception\TaskException;
use Migraine\TaskRuntime;

/**
 * Class IfProcessor
 *
 * @method string getCondition()
 * @method $this setCondition(string $condition)
 * @method string getThen()
 * @method $this setThen(string $task)
 * @method string getElse()
 * @method $this setElse(string $task)
 * @method string getStorage()
 * @method $this setStorage(string $storage)
 *
 * @package Migraine\Processor
 */
class IfProcessor extends AbstractProcessor
{
    /**
     * @var array
     */
    protected array $data = [
        'condition' => null,
        'then' => null,
        'else' => null,
        'storage' => null,
    ];

    /**
     * @inheritdoc
     * @throws StorageException
     * @throws TaskException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $ruler = new Ruler();

        // TODO: Give more values to the context
        $context = new Context();
        $context['storage'] = $this->getStorageOrDefault($taskRuntime, 'storage');

        if ($ruler->assert($this->getCondition(), $context)) {
            $this->forward($taskRuntime, 'then');
        } else {
            $this->forward($taskRuntime, 'else');
        }
    }

    /**
     * Find the task name in the options, and forward to it.
     * If the taskName is empty, do nothing.
     *
     * @param TaskRuntime $taskRuntime
     * @param string $optionName
     * @throws TaskException
     */
    protected function forward(TaskRuntime $taskRuntime, string $optionName): void
    {
        if ($taskName = $this->getData($optionName)) {
            $taskRuntime->execute($taskName);
        }
    }
}
