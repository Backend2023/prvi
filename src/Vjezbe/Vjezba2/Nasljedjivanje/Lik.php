<?php
//include_once "Point.php";
include_once "Line.php";
/**
 * U Euklidskoj geometriji, geometrijski lik je dio ravnine omeđen 
 * s konačno mnogo dužina ili zakrivljenih crta.
 * [1] Geometrijski lik u svom opisu ne sadrži sljedeće informacije:
 *  položaj, veličinu, orijentaciju i refleksiju.[2]
 */
abstract class Lik
{  // apstraktna klasa se ne moze instancirati u objekt

    public function povrsina()
    {
    }
    public function opseg()
    {
    }
}
define('PI', 3.14);
class Krug extends Lik
{
    private Point $p; //iskodište
    private float $r; // polumjer
    public function __construct(Point $p, float $r)
    {
        $this->r = $r;
        $this->p = $p;
    }
    public function povrsina()
    {
        return $this->r ** 2 * PI;
    }
    public function opseg()
    {
        return 2 * $this->r * PI;
    }
}

class Pravokutnik extends Lik
{
    private Point $p1; // donja lijeva tocka
    private Point $p2; // gornja desna točka
    protected Line $diagonala;
    public function __construct(Point $p1, Point $p2)
    {
        $this->p1 = $p1;
        $this->p2 = $p2;
        $this->diagonala = new Line(null, $p1, $p2);
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
    public function opseg()
    {
        return 4*$this->diagonala->duljina();  // ova dijagonala predstavlja stanicu
    }
    public function povrsina()
    {

        return $this->diagonala->duljina()**2;
    }
    public function __toString()
    {
        return "Kvadrat: " . $this->diagonala->duljina() . "X" . $this->diagonala->duljina()
            . " povrsina:" . round($this->povrsina(), 2)
            . " opseg:" . round($this->opseg(), 2);
    }
}


//$lik1=new Lik();  // OVO NEMA SMISLA


$krug1 = new Krug(new Point(3, 4), 2);  // definicija kruga: ishodiste, radijus 
echo $krug1->opseg() . PHP_EOL;
echo $krug1->povrsina() . PHP_EOL;

$pravokutnik = new Pravokutnik(new Point(0, 0), new Point(3, 4)); // dvije točke, ili jedna linija
echo $pravokutnik . PHP_EOL;

$kvadrat1=new Kvadrat(new Point(0, 0), new Point(4, 0));
echo $kvadrat1 . PHP_EOL;

/*
$kvadrat1=new Kvadrat();
$trokut1=new Trokut();
$pravokutnik=new Pravokutnik();
$monogokut=new Monogokut();
*/
