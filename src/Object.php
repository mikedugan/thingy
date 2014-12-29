<?php namespace Dugan\Thing;

class Object
{
    protected $value;

    protected function __construct($value)
    {
        $this->value = $value;
    }

    public static function create($value)
    {
        return new self($value);
    }
}
