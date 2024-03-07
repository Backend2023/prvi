<?php
namespace MyCircle;
define('PI', 3.14);


/**
 * 
 * @param  Point $p središte kruga
 * @param float $r polumjer kruga
 *
 */
class Krug extends Lik implements ILik
{
    public $txt="bilo što";
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

    public function getBrojKuteva() {
        return 0;
    }

    public function setBrojKuteva($broj) {
        // krug nema kuteve...
    }
}
