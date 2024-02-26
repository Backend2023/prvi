<?php
// PSR-4 autoloading configured. Use "namespace Mrv\Objekti;" in src/
// Include the Composer autoloader with: require 'vendor/autoload.php';

// for debug add "$c->dayName" into list of watches and go "Debug PHP file"

namespace Mrv\Objekti;
require '../vendor/autoload.php';

use Carbon\Carbon;


$c=new Carbon();
$c->dayName;
echo $c;
echo $c->dayName;
echo $c->addDays(30);


use Some\Namespace\Functions;

//use Some\Namespace\Functions\Functions as myFunctions;

//Error: Class "Some\Namespace\Functions" not found in C:\xampp\htdocs\prva\src\01_objekti\src\index.php on line 24
//$fun = New Funcn\Functions;
$fun= new Functions;
 $fun->a();
 $fun->b();

