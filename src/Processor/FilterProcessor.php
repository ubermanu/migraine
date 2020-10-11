<?php
declare(strict_types=1);

namespace Migraine\Processor;

use Hoa\Ruler\Context;
use Hoa\Ruler\Ruler;
use Migraine\Exception\StorageException;
use Migraine\TaskRuntime;

/**
 * Class FilterProcessor
 *
 * Test each rows of a storage against a certain rule.
 * If it does not match, remove the row.
 * @see https://hoa-project.net/En/Literature/Hack/Ruler.html
 *
 * @package Migraine\Processor
 */
class FilterProcessor extends AbstractProcessor
{
    /**
     * @inheritdoc
     * @throws StorageException
     */
    public function execute(TaskRuntime $taskRuntime): void
    {
        $storage = $this->getStorageOrDefault($taskRuntime, 'in');
        $ruler = new Ruler();

        for ($i = 0, $l = $storage->size(); $i < $l; $i++) {
            $context = new Context($storage->fetch($i));
            if ($ruler->assert($this->getRule(), $context) === false) {
                $storage->remove($i);
            }
        }

        // TODO: Refresh keys
        $storage->copy($storage);
    }

    /**
     * @return string
     */
    public function getRule(): string
    {
        return $this->getData('filter');
    }

    /**
     * @param string $rule
     * @return $this
     */
    public function setRule(string $rule): self
    {
        return $this->setData('filter', $rule);
    }

    /**
     * @return string
     */
    public function getStorage(): string
    {
        return $this->getData('in');
    }

    /**
     * @param string $storage
     * @return $this
     */
    public function setStorage(string $storage): self
    {
        return $this->setData('in', $storage);
    }
}
