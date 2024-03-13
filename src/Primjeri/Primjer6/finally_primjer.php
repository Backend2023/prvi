<?php

class negativeNumberException extends Exception {
    public function errorMessage() {
      //error message
      $errorMsg = 'Error on line '
      .$this->getLine()
      .' in '
      .$this->getFile()
      .': <b>'
      .$this->getMessage()
      .'</b> Broj iz kojeg vadimo korijen mora biti pozitivan!';
      return $errorMsg;
    }
  }

function inverse($x) {
    if (!$x) {  // AKO JE SUPROTNO OD ...
      //  throw new Exception('Division by zero.');
      throw new DivisionByZeroError('Division by zero.');
    }
}


function vadiKorijen($x) {
    if ($x < 0) {  // Ukoliko je strogo manje od nule
      //  throw new Exception negativeNumberException
      throw new negativeNumberException('Broj je manji od nule');
    }
    // TODO
    // Ovdje baci custom excxeption koji kaze da ne može korijen od negativnih brojeva
    return sqrt(1/$x);
}



try {
    echo inverse(-5) . "\n";
    echo vadiKorijen(-5) . "\n";  
}
catch( negativeNumberException $nne){
    echo "kritična greška broja manjeg od nula: ".$nne->getMessage();
}
catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
} finally {
    echo "First finally.\n";
}


//echo inverse(0) . "\n";  // 0 je boolean FALSE


try {
    echo inverse(0) . "\n";  // 0 je boolean FALSE
} 
catch (DivisionByZeroError $e) { // specifični exception (iznimka)
   
    echo 'DJELIM S NULOM ? Caught exception: ',  $e->getMessage(), "\n";
}
catch (Exception $e) {  // generalni ili opci exception (/iznimka)
   
    echo 'Caught exception: ',  $e->getMessage(), "\n";
} finally {
    echo "Second finally.\n";
}

// Continue execution
echo "Hello World\n";
?>