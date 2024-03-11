<?php
namespace MyCircle;


class Circle extends Krug
{
public function __toString()
{
    return "circle ima povrsinu i opseg:".$this->povrsina()." ".$this->opseg();
}
function __destruct() {
    echo PHP_EOL." >>>>   Ovo se izvrsava nakon što se uništi objekt ".__CLASS__.PHP_EOL;
  }
}