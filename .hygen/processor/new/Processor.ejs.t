---
to: src/Processor/<%= Name %>Processor.php
---
<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Migraine\TaskRuntime;

/**
 * Class <%= Name %>Processor
 * @package Migraine\Processor
 */
class <%= Name %>Processor extends AbstractProcessor
{
    /**
     * @inheritDoc
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
    }
}
