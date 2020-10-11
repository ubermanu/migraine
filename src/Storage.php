<?php
declare(strict_types=1);

namespace Migraine;

/**
 * Class Storage
 *
 * A storage is a data container for temporary usage.
 * It can be used to store global registry keys or sources between tasks.
 * Its content will be dumped at the end of the process.
 *
 * @package Migraine
 */
class Storage extends \ArrayObject
{
    /**
     * Get a row by index.
     *
     * @param int $index
     * @return array
     */
    public function fetch(int $index): array
    {
        return $this->offsetGet($index);
    }

    /**
     * Save a row, with index if necessary.
     *
     * @param array $row
     * @param int|null $index
     * @return $this
     */
    public function add(array $row, ?int $index = null): Storage
    {
        if ($index === null) {
            $this->append($row);
        } else {
            $this->offsetSet($index, $row);
        }

        return $this;
    }

    /**
     * Delete a row.
     *
     * @param int $index
     * @return $this
     */
    public function remove(int $index): Storage
    {
        $this->offsetUnset($index);
        return $this;
    }

    /**
     * Empty the storage.
     *
     * @return $this
     */
    public function flush(): Storage
    {
        parent::__construct([]);
        return $this;
    }

    /**
     * Get the size of the storage.
     *
     * @return int
     */
    public function size(): int
    {
        return $this->count();
    }

    /**
     * Copy the content of another storage to this one.
     *
     * @param Storage $storage
     * @return $this
     */
    public function copy(Storage $storage): Storage
    {
        parent::__construct(array_values(iterator_to_array($storage)));
        return $this;
    }

    /**
     * Get the key values of the first row.
     *
     * @return array
     */
    public function getHeader(): array
    {
        return array_keys(current(iterator_to_array($this)));
    }

    /**
     * Convert to array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->getArrayCopy();
    }

    /**
     * Create a storage from keys and rows.
     *
     * @param array $columns
     * @param array $rows
     * @return Storage
     */
    public static function combine(array $columns, array $rows): Storage
    {
        if (count($columns)) {
            foreach ($rows as &$values) {
                $values = array_combine($columns, $values);
            }
        }

        return new Storage(array_values($rows));
    }
}
