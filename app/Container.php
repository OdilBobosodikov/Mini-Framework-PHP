<?php

namespace Miniframework;

use ArrayAccess;
class Container implements ArrayAccess
{
    protected $items = [];
    protected $cache = [];

    public function __construct(array $items = [])
    {
        foreach ($items as $key=>$item)
        {
            $this->offsetSet($key, $item);
        }
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
    $this->items[$offset] = $value;
    }
    public function offsetGet(mixed $offset): mixed
    {
        if(!$this->has($offset)) {
            return null;
        }

        if(isset($this->cache[$offset])){
            return $this->cache[$offset];
        }
        $item = $this->items[$offset]($this);
        $this->cache[$offset] = $item;

        return $item;
    }
    public function offsetUnset(mixed $offset): void
    {
        if($this->has($offset))
        {
            unset($this->items[$offset]);
        }
    }
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->items[$offset]);
    }

    public function  has($offset)
    {
            return $this->offsetExists($offset);
    }

    public function __get(string $prop)
    {
        return $this->offsetGet($prop);
    }
}