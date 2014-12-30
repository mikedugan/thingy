<?php namespace Dugan\Tests\Scalar;

use Dugan\Thingy\Scalar\Integer;
use Dugan\Thingy\Scalar\String;
use Dugan\Thingy\Collection\Collection;

class StringTest extends \PHPUnit_Framework_TestCase {
    protected $resource;
    
    public function setUp()
    {
        parent::setUp();
        $this->resource = new String('foobar');
    }

    protected function checkInt($val)
    {
        $this->assertInstanceOf(Integer::class, $val);
    }

    protected function checkString($val)
    {
        $this->assertInstanceOf(String::class, $val);
    }

    protected function checkArray($val)
    {
        $this->assertInstanceOf(Collection::class, $val);
    }

    /**
    * @test
    */
    public function stringIsInstantiated()
    {
        $this->assertInstanceOf(String::class, $this->resource);
    }

    /**
    * @test
    */
    public function calculatesStringLength()
    {
        $length = $this->resource->length();
        $this->assertEquals(6, $length->value());
        $this->checkInt($length);
    }

    /**
    * @test
    */
    public function explodesString()
    {
        $parts = $this->resource->split(String::infer('b'));
        $this->assertInstanceOf(Collection::class, $parts);
        $this->checkArray($parts);
        $this->checkString($parts->first());
    }

    /**
    * @test
    */
    public function arrayAccessOffsetExists()
    {
        $this->assertTrue($this->resource->offsetExists(1));
    }

    /**
    * @test
    */
    public function arrayAccessOffsetGet()
    {
        $val = $this->resource->offsetGet(0);
        $this->assertEquals('f', $val->value());
        $this->checkString($val);
    }

    /**
    * @test
    */
    public function arrayAccessOffsetSet()
    {
        $this->resource->offsetSet(0, 'g');
        $this->assertEquals('goobar', $this->resource->value());
    }

    /**
    * @test
    */
    public function arrayAccessOffsetUnset()
    {
        $this->assertNull($this->resource->offsetUnset(0));
    }

    /**
    * @test
    */
    public function startsWith()
    {
        $this->assertTrue($this->resource->startsWith(String::infer('foo')));
        $this->assertFalse($this->resource->startsWith(String::infer('bar')));
    }

    /**
    * @test
    */
    public function endsWith()
    {
        $this->assertTrue($this->resource->endsWith(String::infer('bar')));
        $this->assertFalse($this->resource->endsWith(String::infer('foo')));
    }

    /**
    * @test
    */
    public function positionOf()
    {
        $this->assertEquals(0, $this->resource->positionOf(String::infer('f'))->value());
        $this->assertEquals(5, $this->resource->positionOf(String::infer('r'))->value());
    }
}
