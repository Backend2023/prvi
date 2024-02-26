<?php

class User
{
    public int $id;
    public ?string $name;

    public function __construct(int $id, ?string $name) // ? znaci da argument moze biti nullable
    {
        $this->id = $id;
        $this->name = $name;
    }
    public function getIme(){
        return $this->name;
    }
}

$user = new User(1234, null);

var_dump($user->id);
var_dump($user->name);


class Korisnik extends User{
public string $adresa;

 function getMyNameReversed(){
return strrev($this->name);
 }
 public function getIme(){
    return strtoupper($this->name); // hocu moje ime velikim slovimna
}

} 

$k1 = new Korisnik(1234, null);
$k1->name="Marko";
echo $k1->getMyNameReversed();
$k1->adresa="trpimira 44 abc";
echo "kraj";
echo $k1->getIme();


?>