<?php 

class User 
{ 
	
	private $name; // default je public

	function __construct($name) 
	{ 
		// This is initializing the class properties 
		$this->name=$name; 
    }	
     
	function getName() //defult je public
	{ 
		return $this->name; 
	} 
	static function checkOIB(mixed $oib):bool
	{
		try {
			$oib=intval($oib, 10);  // ako ne uspije konverzija, vraća 0
			//if (User::countDigits($oib) == 11 ){  // uz pomoz rekurzije djeljenjem s 10
				
			if (User::countDigits2($oib) == 11 ){   // uz Log10+1 funkciju
				echo $oib;
				return true;
			}
			elseif($oib==0){
				echo "greska! OIB je 0";
				return false;
			}
			else{
				echo "  oib u zanjem elese:    ".$oib;
				return false;
			}
			
			return true;
		} catch (\Throwable $th) {
			echo "greska!";
			//throw $th;
		}
		
		//return 786478638796498;
	}
	//function to count number of digits
    static  function countDigits($MyNum){
	$MyNum = (int)$MyNum;
	if($MyNum != 0)
	  return 1 + self::countDigits($MyNum/10);
	else
	  return 0;
  }
  //function to count number of digits using Logarithms
     static function countDigits2($MyNum){
	return (int)log10(abs($MyNum)) + 1;
  }
}
	
$user= new User("Pero"); 
echo $user->getName().PHP_EOL;

// echo $user->generirajOIB();

echo User::checkOIB("67625378259").PHP_EOL;
echo User::checkOIB("376h5378259").PHP_EOL;
echo User::checkOIB("47695378259").PHP_EOL;
echo User::checkOIB("576953782a9").PHP_EOL;