<?php namespace Dugan\Tests\Scalar;

use Dugan\Thing\Scalar\Integer;

class IntegerTest extends \PHPUnit_Framework_TestCase
{
    protected $resource;
    
    public function setUp()
    {
        parent::setUp();
        $this->resource = new Integer(5);
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
    public function IntegerIsInstantiated()
    {
        $this->assertInstanceOf(Integer::class, $this->resource);
    }

    /**
     * @test
     */
    public function integerAdds()
    {
        $val = $this->resource->add(2);
        $this->assertEquals(7, $val->value());
        $this->checkInt($val);
    }

    /**
     * @test
     */
    public function integerSubtracts()
    {
        $val = $this->resource->subtract(2);
        $this->assertEquals(3, $val->value());
        $this->checkInt($val);
    }

    /**
     * @test
     */
    public function integerMultiplies()
    {
        $val = $this->resource->multiply(2);
        $this->assertEquals(10, $val->value());
        $this->checkInt($val);
    }

    /**
     * @test
     */
    public function integerDivides()
    {
        $val = $this->resource->divide(2);
        $this->assertEquals(2, $val->value());
        $this->checkInt($val);
    }

    /**
     * @test
     */
    public function integerPowers()
    {
        $val = $this->resource->power(2);
        $this->assertEquals(25, $val->value());
        $this->checkInt($val);
    }

    /**
    * @test
    */
    public function integerModulos()
    {
        $this->assertEquals(2, $this->resource->modulo(3)->value());
    }
}
