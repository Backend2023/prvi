<?php

class Point{
 private int $x;
 private int $y;   
 function __construct(?int $x=0, ?int $y=0)
 {
    $this->x=$x;
    $this->y=$y;
 }
 public function __toString()
 {
     return "[".$this->x.",".$this->y."]";
 }
}

$p1= new Point();
echo $p1;
$p2= new Point(y:9);  // predavanje parametara drugim slijedom
echo $p2;