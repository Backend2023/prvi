<?php
include "../vendor/autoload.php";

// ovo moze proci samo ako je Circle definiran u ovom fileu ili je includan direktno
// $cir=new Circle(10);
// echo $cir;

 $c2= new \Math\Geometry\Circle(5);
 echo $c2;

$c3= new \MyCircle\Circle(new \MyCircle\Point(5,7),5);
echo $c3;