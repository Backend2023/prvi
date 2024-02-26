<?php
// app.php
include_once 'includes/autoload.php';

use Fruits\Apple;
use Fruits\Orange;
use Fruits\Banana;

// freely use the classes
$apple = new Apple();
echo $apple->fruit . '<br>';
$orange = new Orange();
echo $orange->fruit . '<br>';
$banana = new Banana();
echo $banana->fruit . '<br>';