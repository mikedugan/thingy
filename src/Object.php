<?php

abstract class Object
{
    protected $value;

    protected function __construct($value)
    {
        $this->value = $value;
    }

    public static function new($value)
    {
        return self::__construct($value);
    }
}
