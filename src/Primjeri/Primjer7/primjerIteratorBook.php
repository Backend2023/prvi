<?php

namespace pmrvic\prvi\Primjeri\Primjer7;

include "./../../../vendor/autoload.php";

use DesignPatterns\Behavioral\Iterator\Book;
use DesignPatterns\Behavioral\Iterator\BookList;
use DesignPatterns\Behavioral\Iterator\PolicaSKnjigama;
use \DesignPatterns\Behavioral\Iterator\BookFactory;
use DesignPatterns\Behavioral\Iterator\Hitovi;

$p1 = new PolicaSKnjigama(BookFactory::napraviHrpuKnjiga(17));
//var_dump($p1);
foreach ($p1->getPolica() as $k) {  // ovo nije dobar princip, 
    //  echo $k->getAuthorAndTitle();
      //var_dump($k);
}
foreach ($p1 as $k) {  // ovo nije dobar princip, 
        echo $k->getAuthorAndTitle().PHP_EOL;
        //var_dump($k);
  }
//var_dump($p1);
echo "test";
// kreiraj factory s knigama
//TODO  ne radi foreach petlja, 



// KORISIMO ORIGINAL

$bookList = new BookList();
$bookList->addBook(new Book('Learning PHP Design Patterns', 'William Sanders'));
$bookList->addBook(new Book('Professional Php Design Patterns', 'Aaron Saray'));
$bookList->addBook(new Book('Clean Code', 'Robert C. Martin'));

$books = [];

foreach ($bookList as $book) {
      echo $book->getAuthorAndTitle();
}

/* $hits=new Hitovi($p1->getPolica());
echo $hits->polica->getpr; */

