<?php
include "../../../vendor/autoload.php";

use MyCircle\Circle;
use MyCircle\Krug;
use MyCircle\Point;

$c2= new MyCircle\Circle(new MyCircle\Point(3,4),5.4);
$c3= new Circle(new Point(3,4),5.4);
echo $c2;
echo $c3;
echo $c3->vratiRandomKrug()->opseg();

$krug5=MyCircle\Krug::vratiRandomKrug();
echo "Opseg mog random kruga je: ".$krug5->opseg();


echo "<<< Opseg mog random kruga je: ".(MyCircle\Krug::vratiRandomKrug())->opseg();

// primjer sa self
echo "<<< Opseg mog random kruga je: ".(MyCircle\Krug::vratiRandomKrug3())->opseg();

$krug6= new Krug(new Point(2,2),3.2);

echo $krug6->getMyName();
echo $krug6->getMyParentName();

