<?php
namespace pmrvic\prvi\Primjeri\Primjer7;
include "./../../../vendor/autoload.php";

use DesignPatterns\Creational\SimpleFactory\SimpleFactory;
use DesignPatterns\Creational\SimpleFactory\Bicycle;

$b1=new Bicycle();

$b1->driveTo('more');

$b2=(new SimpleFactory())->createBicycle();  // kreira objekt tipa "Bicycle"
$b2->driveTo('more');






