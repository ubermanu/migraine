<?php
declare(strict_types=1);

namespace Migraine\Processor\Traits;


/**
 * Trait DatabaseAccessTrait
 * @package Migraine\Processor\Traits
 */
trait DatabaseAccessTrait
{
    /**
     * @param string $dsn
     * @param array $options
     * @return \PDO
     */
    protected function getDatabaseConnection(string $dsn = '', array $options = [])
    {
        $username = $options['username'] ?? null;
        $password = $options['password'] ?? null;
        unset($options['username']);
        unset($options['password']);

        return new \PDO($dsn, $username, $password, $options);
    }
}
