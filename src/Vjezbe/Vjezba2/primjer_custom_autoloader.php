<?php



//use Math\Geometry\Circle;
/*
include "./Nasljedjivanje/Circle.php";
include "./Nasljedjivanje/Point.php";
include "./Nasljedjivanje/Krug.php";
include "./Nasljedjivanje/Lik.php";
*/
function my_autoloader($class) {
    include './Nasljedjivanje/' . $class . '.php';
}

 //spl_autoload_register('my_autoloader');
spl_autoload_register(__NAMESPACE__ .'my_autoloader');
// Or, using an anonymous function
// spl_autoload_register(function ($class) {
//     include 'classes/' . $class . '.class.php';
// });

//$c1= new \MyCircle\Kruzic();
 $c1= new Kruzic();
 //$c1= new Nasljedjivanje\Kruzic();
 echo $c1;