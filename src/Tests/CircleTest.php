<?php

include "../vendor/autoload.php";

use PHPUnit\Framework\TestCase;

define('PI', 3.14);

class CircleTest extends TestCase {

    public function testVarijablaJeObjektKlaseCircle() {
        $c2 = new \Math\Geometry\Circle(5);
        $this->assertInstanceOf(\Math\Geometry\Circle::class, $c2, "Varijabla nije tipa Circle");
        $this->assertEquals(10, $c2->getDiameter(), "Opseg vraća krivi rezultat");
    }

    public function testPromjerJeDvostrukiRadijus() {
        $c = new \MyCircle\Circle(new \MyCircle\Point(5, 7), 5);

        $this->assertEquals(10 * PI, $c->opseg(), "Opseg vraća krivi rezultat");
        $this->assertEquals(0, $c->getBrojKuteva(), "Brojkuteva u kruku mora biti 0");
    }
}
