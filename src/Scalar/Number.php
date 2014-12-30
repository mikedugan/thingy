<?php namespace Dugan\Thing\Scalar;

use Dugan\Thing\Object;

abstract class Number extends Object
{
    public function add($value)
    {
        return self::infer($this->value + $value);
    }

    public function subtract($value)
    {
        return self::infer($this->value - $value);
    }

    public function divide($value)
    {
        return self::infer($this->value / $value);
    }

    public function multiply($value)
    {
        return self::infer($this->value * $value);
    }

    public function modulo($value)
    {
        return self::infer($this->value % $value);
    }

    public function power($value)
    {
        return self::infer(pow($this->value, $value));
    }

    /**
    *
    * Other functions -> methods of interest:
    * trigonometric function
    * base conversion (2/8/10/16)
    */

    public function toInt()
    {
        return self::infer((int) $this->value);
    }

    public function toFloat()
    {
        return self::infer((float) $this->value);
    }
}
