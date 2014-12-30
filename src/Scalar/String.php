<?php namespace Dugan\Thing\Scalar;

use Dugan\Thing\InvalidValueException;
use Dugan\Thing\Object;

class String extends Object
{
    protected function validate()
    {
        if(! is_string($this->value)) {
            throw new InvalidValueException("{$this->value} is not a valid string");
        }
    }
}
