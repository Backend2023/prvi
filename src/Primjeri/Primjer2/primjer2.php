<?php 
class SomeClass 
{ 

    function __construct() 
    { 
        echo "In constructor, "; 
        $this->name = "Class object! "; 
    } 

    function __destruct() 
    { 
        echo "destroying " . $this->name . "\n"; 
    } 
} 
$obj = new Someclass(); 

