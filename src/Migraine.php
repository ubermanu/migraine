<?php
declare(strict_types=1);

namespace Migraine;

/**
 * Class Migraine
 * @package Migraine
 */
class Migraine
{
    /**
     * @var string
     */
    protected string $version = '2';

    /**
     * @var Task[]
     */
    protected array $tasks = [];

    /**
     * @var Storage[]
     */
    protected array $storages = [];

    /**
     * @param string $taskName
     * @throws Exception
     */
    public function execute(string $taskName = 'default')
    {
        if (empty($this->tasks[$taskName])) {
            throw new Exception(sprintf('The task "%s" does not exist!', $taskName));
        }

//        $this->tasks[$taskName]->execute();
    }
}
