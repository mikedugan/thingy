<?php namespace Dugan\Thingy\Scalar;

use Dugan\Thingy\InvalidValueException;
use Dugan\Thingy\Object;

class String extends Object implements \ArrayAccess
{
    protected function validate()
    {
        if (! is_string($this->value)) {
            throw new InvalidValueException("{$this->value} is not a valid string");
        }
    }

    public function length()
    {
        return self::infer(strlen($this->value));
    }

    public function split(String $delimiter)
    {
        $parts = explode($delimiter->value(), $this->value);
        foreach ($parts as &$part) {
            $part = self::infer($part);
        }

        return self::infer($parts);
    }

    public function positionOf(String $string)
    {
        return self::infer(strpos($this->value, $string->value()));
    }

    public function startsWith(String $string)
    {
        return strpos($this->value, $string->value()) === 0;
    }

    public function endsWith(String $string)
    {
        return strpos($this->value, $string->value())
               ===
               ($this->length()->value() - $string->length()->value());
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Whether a offset exists
     *
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     */
    public function offsetExists($offset)
    {
        return $offset <= (strlen($this->value) - 1);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to retrieve
     *
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     */
    public function offsetGet($offset)
    {
        return self::infer($this->value[$offset]);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to set
     *
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->value[$offset] = $value;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to unset
     *
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     */
    public function offsetUnset($offset)
    {
        $this->value[$offset] = '';
    }
}
