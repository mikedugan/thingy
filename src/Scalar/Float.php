<?php namespace Dugan\Thingy\Scalar;

use Dugan\Thingy\InvalidValueException;

class Float extends Number
{
    protected function validate()
    {
        if(! is_float($this->value)) {
            throw new InvalidValueException("{$this->value} is not a valid float");
        }
    }

    public function ceiling()
    {
        return self::infer((int) ceil($this->value));
    }

    public function floor()
    {
        return self::infer((int) floor($this->value));
    }

    public function round()
    {
        return self::infer((int) round($this->value));
    }
}
