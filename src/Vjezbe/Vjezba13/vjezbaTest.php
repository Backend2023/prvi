<?php
use \PHPUnit\Framework\TestCase;
class Calculator
{
    public function add($a, $b)
    {
        return $a + $b;
    }
}

class CalculatorTest extends TestCase
{
    private $calculator;
 
    protected function setUp():void
    {
        $this->calculator = new Calculator();
    }
 
    protected function tearDown():void
    {
        $this->calculator = NULL;
    }
 
    public function addDataProvider()
    {
        return array(
            array(1,2,3),
            array(0,0,0),
            array(0.00001,0.00002,0.00003),
            array(1000000000,0.00002,0),
            array(-1000000000,0.00002,0),
            array(-1,-1,-2)
        );
    }
 

    #dataProvider addDataProvider
    public function testAdd($a, $b, $expected)
    {
        $result = $this->calculator->add($a, $b);
        $this->assertEquals($expected, $result);
    }
}