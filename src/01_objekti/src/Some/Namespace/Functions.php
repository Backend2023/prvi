<?php
 namespace Some\Namespace;

class Functions { 
    function a () {
        echo PHP_EOL;
        echo __NAMESPACE__." func: ".__FUNCTION__."() ".__FILE__.PHP_EOL;
    }
    
    function b () {
        echo PHP_EOL;
        echo __NAMESPACE__." func: ".__FUNCTION__."() ".__FILE__.PHP_EOL;
    }
}


?>