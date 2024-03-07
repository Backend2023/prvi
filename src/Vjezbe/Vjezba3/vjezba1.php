<?php

interface ICar{
  public function getBoja();
  public function setBoja(string $color);
  public function getHP();
  public function getOwner();
}


abstract class Car 
{
    var $color;
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

class Honda extends Car implements ICar
{
    // Since we inherited abstract method, we need to define it in the child class, 
    // by adding code to the method's body.
    public function calcNumMilesOnFullTank()
    {
      $miles = $this->tankVolume * 30;
      return $miles;
    }
    public function getBoja(){}
    public function getHP(){}
    public function getOwner(){}

    public function setBoja(string $color) {
       $this->color=$color; 
    }
}

class Toyota extends Car implements ICar
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
    public function getBoja(){}
    public function getHP(){}
    public function getOwner(){}

    public function setBoja(string $color) {
        
    }
}

class Lexus extends Toyota implements ICar
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
    public function getBoja(){
      //return "red";
      return $this->color;
    }
    public function getWheel() {
        
    }

    public function hasSunRoof() {
        
    }

    public function setBoja(string $color) {
      $this->color=$color; 
    }

    public function getHP(){}
    public function getOwner(){}
   
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
echo $lex1->getColor().PHP_EOL;//beige
echo $lex1->setBoja("blue");//beige
echo $lex1->getColor().PHP_EOL;//blue
echo $lex1->afterburner();//beige
echo $lex1->getBoja();