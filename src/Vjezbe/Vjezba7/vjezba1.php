<?php
// DesignPatterns, https://designpatternsphp.readthedocs.io/en/latest/Creational/Singleton/README.html
// General singleton class.

/**
 *  KAKO NAPRAVITI SINGLETON:
 *  - kreiram klasu koji smije imati JEDAN I SAMO JEDAN INSTANCIRANI OBJEKT
 *  - postavim konstruktor na private kako bi sprjecio direktno instanciraranje s "new"
 *  - static metodom provjerim jel postoji neko static svojstvo
 *  - ukoliko postoji vrati instancu, ukoliko ne kreiraj novu instancu
 */




class Singleton {
    // Hold the class instance.
    private static $instance = null;
    public $name="xxy";
    // The constructor is private
    // to prevent initiation with outer code.
    public function __construct()
   // private function __construct()   // Obrisati ovaj red i ostaviti samo PRIVATE
    {
      // The expensive process (e.g.,db connection) goes here.
    }
   
    // The object is created from within the class itself
    // only if the class has no instance.
    public static function getInstance()
    {
      if (self::$instance == null)
      {
        self::$instance = new Singleton();
      }
   
      return self::$instance;
    }
}

try {
//$object4= new Singleton();  //   function __construct() je privatna i ne mogu ovako kreirati objekt
//$object5= new Singleton();
} catch (\Throwable $th) {
  echo $th->getMessage();
}


// All the variables point to the same object.
$object1 = Singleton::getInstance();  // ukoliko želim singleton ne mogu koristit "new" !!!
$object2 = Singleton::getInstance();
$object3 = Singleton::getInstance();

$object4= new Singleton();    // SAMO ZA PROBU !!!!, vrati __construct na PRIVATE

echo $object1->name.PHP_EOL;
//$object2->name="tralalla ";
echo $object3->name." object hash:". spl_object_hash($object3)." id:".spl_object_id($object3).PHP_EOL;
echo $object4->name." object hash:". spl_object_hash($object4)." id:".spl_object_id($object4).PHP_EOL;


if ($object1===$object4){
  echo "objekti su indetični".PHP_EOL;
}
else{
  echo "ovo su dva razlicita objekta".PHP_EOL;

}

if ($object1===$object3){
  echo "objekti su indetični".PHP_EOL;
}
else{
  echo "ovo su dva razlicita objekta".PHP_EOL;

}
echo $object3->name." object hash:". spl_object_hash($object3)." id:".spl_object_id($object3).PHP_EOL;
echo $object1->name." object hash:". spl_object_hash($object1)." id:".spl_object_id($object1).PHP_EOL;