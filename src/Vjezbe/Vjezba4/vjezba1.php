<?php
namespace Math\Geometry;

class Circle 
{	
    public $radius;
    
    public function __construct($radius) 
    {
		$this->radius = $radius;
    }
    
    public function getDiameter() 
    {
		return $this->radius * 2;
    }
    
    public function getArea() 
    {
		// (pi)(r^2)
		return \Math\Constants::PI * $this->radius ** 2; 
    }
    
    public function getCircumference() 
    {
		// 2(pi)(r)
		return 2 * \Math\Constants::PI * $this->radius;
	}
  public function __toString()
  {
    return "kružnica, radijus:".$this->radius.PHP_EOL
    ." promjer:".$this->getDiameter().PHP_EOL
    ." povrsina:".$this->getArea().PHP_EOL
    ." opseg:".$this->getCircumference().PHP_EOL;
  }
}
$cir=new Circle(10);
echo $cir;

$c2= new \Math\Geometry\Circle(5);
echo $c2;