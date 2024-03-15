<?php
namespace MyCircle;


// Obično nazivamo AbstractLik
abstract class Lik
{  // apstraktna klasa se ne moze instancirati u objekt
    public $nazivlika="genericki lik";

    public function getnazivlika(){
        return $this->nazivlika;
    }
    abstract public function povrsina();

    abstract public function opseg();

    public function getMyName(){
        // return get_object_vars($this);  // ovo vraća array()
        $opis="Klasa  Lik >>> ".get_class($this).PHP_EOL;
        // foreach (get_object_vars($this) as $key => $value) {
        //     $opis.=$key." = ".$value.PHP_EOL;
        // }
        // var_dump(get_class_vars(__CLASS__));
        // var_dump(get_object_vars($this));  
        return $opis;
    }
}
