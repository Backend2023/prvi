<?php

namespace pmrvic\prvi\Primjeri\Primjer8;

include "./../../../vendor/autoload.php";


use DesignPatterns\Behavioral\Observer\User;
use DesignPatterns\Behavioral\Observer\UserObserver;


$u1=new User();
$u2=new User();

$o1= new UserObserver();
$o2= new UserObserver();

$u1->attach($o1);
$u1->attach($o2);

$u2->attach($o1);

$u1->changeEmail("novi mail");
$u2->changeEmail("drugi mail");

foreach ($o1->getChangedUsers() as $user) {
    echo PHP_EOL.$user;
}

foreach ($o2->getChangedUsers() as $user) {
    echo PHP_EOL.$user;
}
//var_dump($o1->getChangedUsers());
//var_dump($o2->getChangedUsers());
//print_r($o2->getChangedUsers());
