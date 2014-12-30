<?php namespace Dugan\Thing;

use Dugan\Thing\Scalar\Float;
use Dugan\Thing\Scalar\Integer;
use Dugan\Thing\Scalar\String;

class Object
{
    /**
     * @var mixed
     */
    protected $value;

    /**
     * @param $value
     * @throws InvalidValueException
     */
    public function __construct($value)
    {
        $this->value = $value;
        $this->validate();
    }

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * Map of primitive types to classes
     */
    protected static $map = [
        'integer' => Integer::class,
        'double' => Float::class,
        'float' => Float::class,
        'string' => String::class
    ];

    /**
     * @param $value
     * @return Object
     */
    public static function infer($value)
    {
        $type = gettype($value);
        if(array_key_exists($type, self::$map)) {
            return new self::$map[$type]($value);
        }

        return new Object($value);
    }

    /**
     * @throws InvalidValueException
     * @return void
     */
    protected function validate()
    {
        if(is_null($this->value)) {
            throw new InvalidValueException("Value cannot be null");
        }
    }

    /**
     * Allows us to use self-mutating methods by suffixing a method
     * with an underscore.
     *
     * Usage: $myObj->floor_();
     *
     * @param $func
     * @param $args
     * @return void
     */
    public function __call($func, $args)
    {
        if(strpos($func, '_') <= 1) {
            throw new \BadMethodCallException("Method {$func} does not exist");
        }

        $func = $this->getUserFunc($func);
        $this->value = call_user_func_array($func, $args);
        return $this->value;
    }

    /**
     * @param $function
     * @return array
     */
    protected function getUserFunc($function)
    {
        return [$this, explode($function, '_')[0]];
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->value;
    }
}
