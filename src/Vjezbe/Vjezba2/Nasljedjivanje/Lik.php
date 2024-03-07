<?php
namespace MyCircle;

//include_once "Point.php";
include_once "Line.php";
/**
 * U Euklidskoj geometriji, geometrijski lik je dio ravnine omeđen 
 * s konačno mnogo dužina ili zakrivljenih crta.
 * [1] Geometrijski lik u svom opisu ne sadrži sljedeće informacije:
 *  položaj, veličinu, orijentaciju i refleksiju.[2]
 */

 // IFACE JE UGOVOR !!!
 //InterfaceName nazivam ILik
interface ILik {
  public function getBrojKuteva();
  public function setBrojKuteva($broj);
}

// Obično nazivamo ALik
abstract class Lik
{  // apstraktna klasa se ne moze instancirati u objekt

    abstract public function povrsina();

    abstract public function opseg();

    public function getMyName(){
        // return get_object_vars($this);  // ovo vraća array()
        $opis="Klasa ".get_class($this).PHP_EOL;
        // foreach (get_object_vars($this) as $key => $value) {
        //     $opis.=$key." = ".$value.PHP_EOL;
        // }
        // var_dump(get_class_vars(__CLASS__));
        // var_dump(get_object_vars($this));  
        return $opis;
    }
}


class Pravokutnik extends Lik implements ILik
{
    protected Point $p1; // donja lijeva tocka
    protected Point $p3; // gornja desna točka
    protected Point $p2; // donja desna tocka
    protected Point $p4; // gornja lijeva točka

    protected Line $diagonala;
    public function __construct(Point $p1, Point $p3)
    {
        $this->p1 = $p1;
        $this->p3 = $p3;
        $this->diagonala = new Line(null, $p1, $p3);
        $this->p2=new Point($p3->getX(), $p1->getY()); 
        $this->p4=new Point($p1->getX(), $p3->getY()); 
    }
    public function getBrojKuteva() {
        return 4;
    }

    public function setBrojKuteva($broj) {
        // ovo nije poligon, mnogokut pa je uvijek 4 kuta
    }
    public function povrsina()
    {

        return $this->diagonala->kateta_x() * $this->diagonala->kateta_y();
    }
    public function opseg()
    {
        return 2 * $this->diagonala->kateta_x() + 2 * $this->diagonala->kateta_y();
    }
    public function __toString()
    {
        return "Pravokutnik: " . $this->diagonala->kateta_x() . "X" . $this->diagonala->kateta_y()
            . " povrsina:" . round($this->povrsina(), 2)
            . " opseg:" . round($this->opseg(), 2);
    }
}
class Kvadrat extends Pravokutnik {
    public function __construct(Point $p1, Point $p2)
    {
        $this->p1 = $p1;
        $this->p2 = $p2;
       // $this->diagonala = new Line(null, $p1, $p3);
       //$l1=$l3 = new Line(null, new Point(0, 0), new Point(3, 4));
       $line_a = new Line(null, $p1, $p2);

       //$l5 = new Line(new Point(3, 3), 10, 30);
       $line_b = new Line($p2, $line_a->duljina(),$line_a->kut()+90);
       
       // točka p3 je na kraju line_b
       $this->p3=$line_b->getP2();

       // sad nam je pocetna točka p3
       $line_c= new Line( $this->p3, $line_a->duljina(),$line_a->kut()+180);
       
       // točka p4 je na kraju line_c
       $this->p4=$line_c->getP2();

       // $this->p3=new Point($p3->getX(), $p1->getY()); 
       // $this->p4=new Point($p1->getX(), $p3->getY()); 

       $this->diagonala=new Line(null, $this->p1, $this->p3);
    }
    public function opseg()
    {
        $line_a = new Line(null, $this->p1, $this->p2);
        return 4* $line_a->duljina();  
    }
    public function povrsina()
    {
        $line_a = new Line(null, $this->p1, $this->p2);
        return $line_a->duljina()*$line_a->duljina();  

    }
    public function __toString()
    {
        return "Kvadrat: " . (new Line(null, $this->p1, $this->p2))->duljina() 
        . "X" . (new Line(null, $this->p1, $this->p2))->duljina()
            . " povrsina:" . round($this->povrsina(), 2)
            . " opseg:" . round($this->opseg(), 2)
            . " p1:" . $this->p1
            . " p2:" . $this->p2
            . " p3:" . $this->p3
            . " p4:" . $this->p4;
    }
}


//$lik1=new Lik();  // OVO NEMA SMISLA

//TODO
/*
PHP Fatal error:  Uncaught Error: Class "MyCircle\Krug" not found in C:\xampp\htdocs\prva\src\Vjezbe\Vjezba2\Nasljedjivanje\Lik.php:134
Stack trace:
#0 {main}
  thrown in C:\xampp\htdocs\prva\src\Vjezbe\Vjezba2\Nasljedjivanje\Lik.php on line 134
*

/*
$krug1 = new \MyCircle\Krug(new Point(3, 4), 2);  // definicija kruga: ishodiste, radijus 
echo $krug1->opseg() . PHP_EOL;
echo $krug1->povrsina() . PHP_EOL;
echo $krug1->getMyName();


$krug2 = new Circle(new Point(3, 4), 2);  // definicija kruga: ishodiste, radijus 
echo $krug2->opseg() . PHP_EOL;
echo $krug2->povrsina() . PHP_EOL;
echo $krug2->getMyName();
*/
$pravokutnik = new Pravokutnik(new Point(0, 0), new Point(3, 4)); // dvije točke dijagonale, ili jedna linija 
echo $pravokutnik . PHP_EOL;
echo $pravokutnik->getMyName();

$kvadrat1=new Kvadrat(new Point(0, 0), new Point(4, 0)); // dvije točke jedne stranice
echo $kvadrat1 . PHP_EOL;
echo $kvadrat1->getMyName();

$kvadrat2=new Kvadrat(new Point(2, 0), new Point(6, 0)); // dvije točke jedne stranice
echo $kvadrat2 . PHP_EOL;
echo $kvadrat2->getMyName();


$kvadrat2=new Kvadrat(new Point(1, 1), new Point(3, 3)); // dvije točke jedne stranice
echo $kvadrat2 . PHP_EOL;
echo $kvadrat2->getMyName();
/*
$kvadrat1=new Kvadrat();
$trokut1=new Trokut();
$pravokutnik=new Pravokutnik();
$monogokut=new Monogokut();
*/

/*
Za idući puta:
dodati u pravokutnik točke p1,p2,p3,p4
pravokutnik kreiramo s p1-p3
kvadrat kreiramo s p1-p2 kao stranice, zatim od p2 pravimo line pod kutem 90 
i dobijamo p3, isto od p1 pod kutem 90 pravimo p4.
pripazimo pod kojim kutem je p1-p2
Trokut je izazov.


*/
class Mnogokut extends Lik
{
    protected Point $p1; // donja lijeva tocka
    protected Point $p2; // donja desna tocka
    protected float $radijus; // od ishodista do prve točke
    protected int $N; //N je broj strana
    private float $alpha;  // unutarnji kut izmedju dvije stranice

    var $nizTočaka=[];  // polyline  [Point p1,Point p2, ... ]
    public function __construct(Point $p1, Point $p2)
    {
// $this->alpha= 180*($this->N-2)/$this->N
    }
    public function opseg(){}  // ako postoje abstract metode mora ih se pregaziti (override)
    
   public function povrsina(){}
}