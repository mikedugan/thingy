<?php namespace Dugan\Thing\Scalar;

use Dugan\Thing\InvalidValueException;

class Integer extends Number
{
    protected function isValid()
    {
        if (! is_int($this->value)) {
            throw new InvalidValueException("{$this->value} is not a valid integer");
        }
    }

    public function divide($value)
    {
        $return = (int)($this->value / $value);
        return self::infer($return);
    }
}
