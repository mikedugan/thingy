<?php namespace Dugan\Tests;

use Dugan\Thingy\Object;
use Dugan\Thingy\Scalar\Float;
use Dugan\Thingy\Scalar\Integer;
use Dugan\Thingy\Scalar\String;

class ObjectTest extends \PHPUnit_Framework_TestCase {
    protected $resource;
    
    public function setUp()
    {
        parent::setUp();
        $this->resource = new Object('foo');
    }
    
    public function tearDown()
    {
    }

    /**
    * @test
    */
    public function objectIsInstantiated()
    {
        $this->assertInstanceOf(Object::class, $this->resource);
    }

    /**
    * @test
    * @expectedException \Dugan\Thingy\InvalidValueException
    * @expectedExceptionMessage Value cannot be null
    */
    public function validatesObject()
    {
        $obj = new Object(null);
    }

    /**
    * @test
    * @expectedException \BadMethodCallException
    * @expectedExceptionMessage Method _ does not exist
    */
    public function throwsBadMethodCall()
    {
        $this->resource->foo_();
    }

    /**
    * @test
    */
    public function convertsToString()
    {
        $this->assertEquals('foo', $this->resource->value());
        $this->assertEquals('foo', $this->resource);
    }

    /**
    * @test
    */
    public function infersIntType()
    {
        $this->assertInstanceOf(Integer::class, Object::infer(5));
    }

    /**
    * @test
    */
    public function infersFloatType()
    {
        $this->assertInstanceOf(Float::class, Object::infer(5.1));
    }

    /**
    * @test
    */
    public function infersStringType()
    {
        $this->assertInstanceOf(String::class, Object::infer('foo'));
    }

}
