<?php
declare(strict_types=1);

namespace Migraine\Traits;

use Migraine\Exception;

/**
 * Trait DataObjectTrait
 * @package Migraine\Traits
 */
trait DataObjectTrait
{
    /**
     * @var array
     */
    protected array $data = [];

    /**
     * @param string $key
     * @return mixed|null
     */
    public function getData(string $key)
    {
        return $this->data[$key] ?? null;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function hasData(string $key): bool
    {
        return isset($this->data[$key]);
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function setData(string $key, $value): DataObjectTrait
    {
        $this->data[$key] = $value;
        return $this;
    }

    /**
     * @param string|null $key
     * @return $this
     */
    public function unsetData(?string $key = null): DataObjectTrait
    {
        if (is_null($key)) {
            $this->data = [];
        } else {
            if (isset($this->data[$key]) || array_key_exists($key, $this->data)) {
                unset($this->data[$key]);
            }
        }
        return $this;
    }

    /**
     * @param string $method
     * @param array $args
     * @return mixed
     * @throws Exception
     */
    public function __call(string $method, array $args)
    {
        switch (substr($method, 0, 3)) {
            case 'get':
                $key = $this->_underscore(substr($method, 3));
                return $this->getData($key);
            case 'set':
                $key = $this->_underscore(substr($method, 3));
                $value = isset($args[0]) ? $args[0] : null;
                return $this->setData($key, $value);
            case 'uns':
                $key = $this->_underscore(substr($method, 3));
                return $this->unsetData($key);
            case 'has':
                $key = $this->_underscore(substr($method, 3));
                return $this->hasData($key);
        }

        throw new Exception('Method does not exist');
    }

    /**
     * @param $name
     * @return mixed|string
     */
    protected function _underscore($name)
    {
        return strtolower(trim(preg_replace('/([A-Z]|[0-9]+)/', "_$1", $name), '_'));
    }
}
