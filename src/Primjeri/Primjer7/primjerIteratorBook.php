<?php

namespace pmrvic\prvi\Primjeri\Primjer7;

include "./../../../vendor/autoload.php";

use DesignPatterns\Behavioral\Iterator\Book;
use DesignPatterns\Behavioral\Iterator\BookList;
use DesignPatterns\Behavioral\Iterator\PolicaSKnjigama;
use \DesignPatterns\Behavioral\Iterator\BookFactory;
use DesignPatterns\Behavioral\Iterator\Hitovi;

use Random\Randomizer;

$p1 = new PolicaSKnjigama(BookFactory::napraviHrpuKnjiga(3));
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



$r = new Randomizer();  // @since 8.2
//  \Random\Randomizer::getFloat(0.01,99.9) // @since 8.3

echo PHP_EOL.PHP_EOL."normal order >>>>>".PHP_EOL;
foreach ($bookList as $book) {
      $book->setPrice($r->getInt(0, 1000)/10);
      echo PHP_EOL.$book->getAuthorAndTitle()." cijena:".$book->getPrice();
}

// sortiraj mi knjige po cijeni
//$bookList=sort($bookList); //TODO ubaci ITERABLE

echo PHP_EOL.PHP_EOL."sortByPrice() order >>>>>";
$bookList->sortByPrice();

foreach ($bookList as $book) {
      echo PHP_EOL.$book->getAuthorAndTitle()." cijena:".$book->getPrice();
}



echo PHP_EOL.PHP_EOL."sortByTitle() order >>>>>".PHP_EOL;
$bookList->sortByTitle();

foreach ($bookList as $book) {
    //  $book->setPrice($r->getInt(0, 1000)/10);
      echo PHP_EOL.$book->getAuthorAndTitle()." cijena:".$book->getPrice();
}


echo PHP_EOL.PHP_EOL."sortByPrice2() order >>>>>";
$bookList->sortByPrice2();

foreach ($bookList as $book) {
      echo PHP_EOL.$book->getAuthorAndTitle()." cijena:".$book->getPrice();
}
