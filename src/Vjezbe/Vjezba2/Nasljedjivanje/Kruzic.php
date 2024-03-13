<?php
// custom autoloader s namespacima?
namespace Nasljedjivanje;
use Stringable;  // ako maknem ovo onda pokusava dohvatiti klasu \Nasljedjivanje\Stringable


class Kruzic implements Stringable
{
public function __toString()
{
    return "Proba custom autoloadera";
}
}