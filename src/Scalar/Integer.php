<?php namespace Dugan\Thingy\Scalar;

use Dugan\Thingy\InvalidValueException;

class Integer extends Number
{
    protected function validate()
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
