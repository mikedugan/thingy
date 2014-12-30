<?php namespace Dugan\Tests;

use Dugan\Thingy\Scalar\Float;
use Dugan\Thingy\Scalar\Integer;

class FloatTest extends \PHPUnit_Framework_TestCase {
    protected $resource;
    
    public function setUp()
    {
        parent::setUp();
        $this->resource = new Float(5.22);
    }

    /**
    * @test
    */
    public function floatIsInstantiated()
    {
        $this->assertInstanceOf(Float::class, $this->resource);
    }

    protected function checkFloat($value = null)
    {
        $val = $value ? $value : $this->resource->value();
        $this->assertInstanceOf(Float::class, $val);
    }

    protected function checkInt($value = null)
    {
        $val = $value ? $value : $this->resource->value();
        $this->assertInstanceOf(Integer::class, $val);
    }

    /**
    * @test
    */
    public function floatAdds()
    {
        $val = $this->resource->add(2);
        $this->assertEquals(7.22, $val->value());
        $this->checkFloat($val);
    }

    /**
    * @test
    */
    public function floatSubtracts()
    {
        $val = $this->resource->subtract(2);
        $this->assertEquals(3.22, $val->value());
        $this->checkFloat($val);
    }

    /**
    * @test
    */
    public function floatMultiplies()
    {
        $val = $this->resource->multiply(2);
        $this->assertEquals(10.44, $val->value());
        $this->checkFloat($val);
    }

    /**
    * @test
    */
    public function floatDivides()
    {
        $val = $this->resource->divide(2);
        $this->assertEquals(2.61, $val->value());
        $this->checkFloat($val);
    }
    
    /**
    * @test
    */
    public function floatPowers()
    {
        $val = $this->resource->power(2);
        $this->assertEquals(27.2484, $val->value());
        $this->checkFloat($val);
    }

    /**
     * @test
     */
    public function floatFloors()
    {
        $val = $this->resource->floor();
        $this->assertEquals(5, $val->value());
        $this->checkInt($val);
    }

    /**
     * @test
     */
    public function floatCeilings()
    {
        $val = $this->resource->ceiling();
        $this->assertEquals(6.0, $val->value());
        $this->checkInt($val);
    }

    /**
     * @test
     */
    public function floatRounds()
    {
        $val = $this->resource->round();
        $this->assertEquals(5.0, $val->value());
        $this->checkInt($val);
    }

    /**
    * @test
    */
    public function floatModulos()
    {
        $val = $this->resource->modulo(3);
        $this->assertEquals(2, $val->value());
    }
}
