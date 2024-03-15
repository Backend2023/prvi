<?php
namespace pmrvic\prvi\Primjeri\Primjer7;
include "./../../../vendor/autoload.php";

/*
Za razliku od simple factory, static koristi static metodu, 
dakle ne treba kreirati objekt tipa factory
*/

use DesignPatterns\Creational\StaticFactory\StaticFactory;
use Exception;
use InvalidArgumentException;
//use Exception;
//use DesignPatterns\Creational\StaticFactory\FormatNumber;
//use DesignPatterns\Creational\StaticFactory\FormatString;
//use DesignPatterns\Creational\StaticFactory\Formatter;


$broj1=StaticFactory::factory('number');

$tekst1=StaticFactory::factory('string');



try {
    $greska1=StaticFactory::factory('int');
} 
catch (InvalidArgumentException $exc) {

    echo PHP_EOL."mozes unijeti samo 'number'  ili 'string'";
}
catch (Exception $exc) {
    echo $exc->getTraceAsString();
} finally {
    echo PHP_EOL."evo sve sam rijesio, exception je uhvaćen!";
}

// Zelim kreirati 100 objekata tipa number...

/*
 * 
 * $broj1=StaticFactory::factory('number');
 * ...
 * $broj100=StaticFactory::factory('number');
 * 
 */
$stobrojeva=[];

// Primjer masovnog kreiranja objekata:
$stobrojeva=StaticFactory::factoryMassProduce('number',100);
var_dump($stobrojeva);



