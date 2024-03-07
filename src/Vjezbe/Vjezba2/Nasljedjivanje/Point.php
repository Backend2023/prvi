<?php
namespace MyCircle;
class Point{
 private float $x;
 private float $y;   
 function __construct(?float $x=0, ?float $y=0) // konstruktor
 {
    $this->x=$x;
    $this->y=$y;
 }
 public function getX():float{  // getter
    return $this->x;
 }
 public function getY():float{
    return $this->y;
 }
 public function __toString()  // magic metoda __toString()
 {
     return "[".round($this->x,2).",".round($this->y,2)."]";
 }
}
/*
$p1= new Point();
echo $p1.PHP_EOL;
$p2= new Point(y:7);  // predavanje parametara drugim slijedom
echo $p2.PHP_EOL;

*/