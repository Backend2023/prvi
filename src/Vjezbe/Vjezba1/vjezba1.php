<?php

// Declare the class
/**
 * Klasa User opisuje objekt user
 */
class User 
{
 
    // properties
    public $name; 
    private $godine;

    public function __construct(string $name="Joe",int $godine=0) { 
        $this->setName($name);
        $this->godine=$godine;
    }
    public function setName(string $ime):void  // mutator
    {
         $this->name= ucfirst(strtolower($ime)) ;
    } 
    // method that return $name
    public function getName():string  // Accesssor (getteri / setteri)
    {
        return $this->name;
    }
    public function punoljetan():bool  
    {
        return ($this->godine<18) ? false : true;
    } 
    public function getGodine():int  // getter
    {
        return $this->godine;
    } 
    public function setGodine(int $god):void  // setteri
    {
         $this->godine=$god;
    } 


}
 
// Create an instance
// Instanca klase User je objekt $user
$user = new User();
echo $user->getName();

// Moze ovako ili preko mutatora setName()
$user->name = 'ivica';

$user->setName('ivica');

echo $user->getName().PHP_EOL;

$user2 = new User('marica',23);
echo $user2->getName().PHP_EOL;
// ne mogu dohvatiti svojstvo jer je visibility PRIVATE
//echo $user2->godine;

// jeli Marica punoljetna?
echo $user2->punoljetan().PHP_EOL;

// Jeli Ivica punoljetan?
echo $user->punoljetan().PHP_EOL;
echo $user->getGodine().PHP_EOL;

if($user->punoljetan()){
    echo "Objekt ".$user->name." je punoljetan i smije glasovati i voziti automobil".PHP_EOL;
}
else{
    echo "Objekt ".$user->name." jemaloljetan i mora kući kad padne mrak".PHP_EOL;
}

// Postavljamo godine ... 
echo $user->setGodine(25).PHP_EOL;


if($user->punoljetan()){
    echo "Objekt ".$user->name." je punoljetan i smije glasovati i voziti automobil".PHP_EOL;
}
else{
    echo "Objekt ".$user->name." jemaloljetan i mora kući kad padne mrak".PHP_EOL;
}

// DRY PRINCIP DO NOT REPEAT YOURSELF
