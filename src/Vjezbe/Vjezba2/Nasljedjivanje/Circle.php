<?php
namespace MyCircle;


class Circle extends Krug
{
public function __toString()
{
    return "circle ima povrsinu i opseg:".$this->povrsina()." ".$this->opseg();
}
}