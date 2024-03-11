<?php
include "./Nasljedjivanje/Lik.php";  // bitan je i redosljed include!!
include "./Nasljedjivanje/Krug.php";
include "./Nasljedjivanje/Circle.php";
// include "./Nasljedjivanje/Lik.php";  // bitan je i redosljed include, OVO NE RADI


$c2= new MyCircle\Circle(new MyCircle\Point(3,4),5.4);
//$c3= new Circle(new Point(3,4),5.4);
echo $c2;
//echo $c3;