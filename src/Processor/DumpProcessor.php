<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\TaskRuntime;

/**
 * Class DumpProcessor
 * @package Migraine\Processor
 */
class DumpProcessor extends AbstractProcessor
{
    /**
     * @inheritdoc
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        // TODO: Add support for some writers types
        $storage = $this->getStorageOrDefault($taskRuntime, 'dump');
        print_r(iterator_to_array($storage));
        exit;
    }
}
