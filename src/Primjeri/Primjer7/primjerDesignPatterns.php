<?php
namespace pmrvic\prvi\Primjeri\Primjer7;
include "./../../../vendor/autoload.php";

use DesignPatterns\Creational\Singleton\Singleton;


$object1 =  Singleton::getInstance();
$object3 = Singleton::getInstance();

if ($object1===$object3){
    echo "objekti su indetični".PHP_EOL;
  }
  else{
    echo "ovo su dva razlicita objekta".PHP_EOL;
  
  }
  echo " object hash:". spl_object_hash($object3)." id:".spl_object_id($object3).PHP_EOL;
  echo " object hash:". spl_object_hash($object1)." id:".spl_object_id($object1).PHP_EOL;
