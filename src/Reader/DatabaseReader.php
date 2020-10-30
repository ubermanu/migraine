<?php
declare(strict_types=1);

namespace Migraine\Reader;

use Migraine\Processor\Traits\DatabaseAccessTrait;
use Migraine\Storage;

/**
 * Class DatabaseReader
 * @package Migraine\Reader
 */
class DatabaseReader extends AbstractReader
{
    use DatabaseAccessTrait;

    public function read(?string $resource, array $options): Storage
    {
        $tableName = $options['table'];
        unset($options['table']);

        $db = $this->getDatabaseConnection($resource, $options);

        // TODO: Avoid SQL injections
        $statement = $db->query(sprintf('SELECT * FROM %s', $tableName));
        $data = $statement->fetchAll(\PDO::FETCH_NAMED);

        return new Storage($data);
    }
}
