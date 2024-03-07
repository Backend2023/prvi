<?php

abstract class Car 
{
    // Abstract classes can have properties
    protected $tankVolume;
   
    // Abstract classes can have non abstract methods
    public function setTankVolume($volume)
    {
      $this->tankVolume = $volume;
    }
   
    // Abstract method
    abstract public function calcNumMilesOnFullTank();
}

class Honda extends Car 
{
    // Since we inherited abstract method, we need to define it in the child class, 
    // by adding code to the method's body.
    public function calcNumMilesOnFullTank()
    {
      $miles = $this->tankVolume * 30;
      return $miles;
    }
}

class Toyota extends Car 
{
    // Since we inherited abstract method, we need to define it in the child class, 
    // by adding code to the method's body.
    public function calcNumMilesOnFullTank()
    {
      $miles = $this->tankVolume * 33;
      return $miles;
    }
   
    public function getColor()
    {
      return "beige";
    }
}

class Lexus extends Toyota 
{
    // Since we inherited abstract method, we need to define it in the child class, 
    // by adding code to the method's body.
    public function calcNumMilesOnFullTank()
    {
      $miles = $this->tankVolume * 25;
      return $miles;
    }
    public function afterburner()
    {
      return "letim....";
    }
   
}

$toyota1 = new Toyota();
$toyota1->setTankVolume(10);
echo $toyota1->calcNumMilesOnFullTank();//330
echo $toyota1->getColor();//beige

$h1 = new Honda();
$h1->setTankVolume(10);
echo $h1->calcNumMilesOnFullTank();//330
//echo $h1->getColor();//beige

$lex1 = new Lexus();
$lex1->setTankVolume(10);
echo $lex1->calcNumMilesOnFullTank();//330
echo $lex1->getColor();//beige
echo $lex1->afterburner();//beige