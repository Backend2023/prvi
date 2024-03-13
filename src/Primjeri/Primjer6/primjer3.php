<?php
class customException extends Exception {
  public function errorMessage() {
    //error message
    $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
    .': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
    return $errorMsg;
  }
}
//echo FILTER_VALIDATE_EMAIL;   // ispise konstantu 274

$email = "someone@example.com";

function test($x):int {
  return $x;
}

try {
  //check if
  if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
   // if(filter_var($email, 274) === FALSE) {  // mogli smo u ove filtere ubaciti i brojeve email je 274
    //throw exception if email is not valid
    throw new customException($email);
  }

 // test('ss');

  echo 75372/0;
  echo "sve je ok!";


}
/*
catch (customException $e) {  // naš custom samo za ovu priliku
  //display custom message
  echo $e->errorMessage();
}
catch (DivisionByZeroError $e) {   // generički exception
  //display custom message
  echo "NE MOŽEMO DIJELITI S NULOM ".$e->getMessage();
}
*/
catch (Error $ex) {   // generički exception
  //display custom message
  echo $ex->getMessage();
}
/*
catch (Throwable $e) {   // generički exception
  //display custom message
  echo "Generik ".$e->getMessage();
}
*/