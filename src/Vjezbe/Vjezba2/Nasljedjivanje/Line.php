<?php
namespace MyCircle;
include "Point.php";

class Line
{

    private Point $p1;
    private Point $p2;
    public function __construct(?Point $param0, mixed $param1, mixed $param2)
    {
        $this->p1 = new Point(0, 0);
        $this->p2 = new Point(0, 0);
        //echo get_class($param1);

        if ($param1 != null && gettype($param1) == "object") {
            if (get_class($param1) == "Point") {
                $this->p1 = $param1;
            }
        } else if ($param1 == null) {
            $this->p1 = new Point(0, 0);
        }

        if ($param2 != null && gettype($param2) == "object") {
            if (get_class($param2) == "Point") {
                $this->p2 = $param2;
            }
        } else if ($param2 == null) {
            $this->p2 = new Point(0, 0);
        } else if ($param0 == null && gettype($param1) == "integer" && gettype($param2) == "integer") {

            $this->p1 = new Point(0, 0);
            $this->p2 = new Point(
                $param1 * cos(deg2rad($param2)),
                $param1 * sin(deg2rad($param2))
            ); // x = L=cos(alfa), y = L=sin(alfa)
        } else if ($param0 != null && (gettype($param1) == "integer" && gettype($param2) == "integer")
        ||gettype($param1) == "double" && gettype($param2) == "double") {

            $this->p1 = $param0;
            $this->p2 = new Point(
                $this->p1->getX() + $param1 * cos(deg2rad($param2)),
                $this->p1->getY() + $param1 * sin(deg2rad($param2))
            ); // x = L=cos(alfa), y = L=sin(alfa)
        }
    }
    public function getP1():Point{
        return $this->p1;
    }
    public function getP2():Point{
        return $this->p2;
    }
 public function duljina():float{
   // $kateta_x = $this->p2->getX() - $this->p1->getX(); // razlika x od koordinata p1 i p2
   $kateta_x =$this->kateta_x();
    $kateta_y = $this->p2->getY() - $this->p1->getY(); // razlika y od koordinata p1 i p2
   // return sqrt( $kateta_x* $kateta_x + $kateta_y**2);
   return sqrt(  pow($kateta_x, 2)+ pow($kateta_y, 2));  // Pitagora
 }
 public function kut(){
    $kateta_x = $this->p2->getX() - $this->p1->getX(); // razlika x od koordinata p1 i p2
    $kateta_y = $this->p2->getY() - $this->p1->getY(); // razlika y od koordinata p1 i p2

   // return ($kateta_x==0)?null:rad2deg(atan( $kateta_y / $kateta_x));
   return ($kateta_x==0) ? 90 :rad2deg(atan( $kateta_y / $kateta_x));
 }
 public function kateta_x(){
    return $this->p2->getX() - $this->p1->getX();
 } 
 public function kateta_y(){
    return $this->p2->getY() - $this->p1->getY();
 } 

    public function __toString()
    {
        return "Line: " . $this->p1 . "-" . $this->p2 
        ." duljina:".$this->duljina()
        ." kut:".round($this->kut(),2);
    }
}

$l1 = new Line(null, null, null);  // koordinate [0,0][0,0]
$l2 = new Line(null, 10, 45);  // linija duljine 1 pod kutom 45° 
$l4 = new Line(null, 10, 30);  // linija duljine 1 pod kutom 45° 
$l3 = new Line(null, new Point(0, 0), new Point(3, 4));
$l5 = new Line(new Point(3, 3), 10, 30);  // ishodište, duljina i kut 

echo "l1:" . $l1 . PHP_EOL;
echo "l2:" . $l2 . PHP_EOL;
echo "l3:" . $l3 . PHP_EOL;
echo "l4:" . $l4 . PHP_EOL;
echo "l5:" . $l5 . PHP_EOL;
