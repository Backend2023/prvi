<?php
//namespace Vjezba2;


//use Math\Geometry\Circle;
/*
include "./Nasljedjivanje/Circle.php";
include "./Nasljedjivanje/Point.php";
include "./Nasljedjivanje/Krug.php";
include "./Nasljedjivanje/Lik.php";
*/
function my_autoloader($class) {
    include  $class . '.php';
    // include __DIR__ .'\\'. $class . '.php';  // OVO ISTO RADI
}

 spl_autoload_register('my_autoloader');

 $c2= new \Nasljedjivanje\Kruzic();
 $c3= new Nasljedjivanje\Kruzic();
 echo $c2;
 echo $c3;