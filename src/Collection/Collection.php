<?php namespace Dugan\Thingy\Collection;

use Dugan\Thingy\InvalidValueException;
use Dugan\Thingy\Object;

class Collection extends Object
{
    public function validate()
    {
        if(! is_array($this->value)) {
            throw new InvalidValueException("Elements must be an array");
        }
    }

    public function first()
    {
        return $this->value[0];
    }

    public function append()
    {

    }

    public function prepend()
    {

    }

    // I really should just find an array library
}
