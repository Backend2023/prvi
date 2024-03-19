<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Iterator;


use Countable;
use Iterator;

class PolicaSKnjigama implements Countable, Iterator{
    private array  $polica=[];  // mjesto na kojem drzim knjige
    private int $currentIndex = 0;
      
    
    public function __construct(array $knjige) {
        $this->polica=$knjige;
    }
    
    public function getPolica(): array {
        return $this->polica;
    }
    public function count(): int {
        return count($this->polica);
    }

   // public function current(): mixed {  // moye ovako generalni tip
    public function current(): Book {   // ili ako znamo tip koji stavljamo u listi
        return $this->polica[$this->currentIndex];
    }

    public function key(): mixed {
        return $this->currentIndex;
    }

    public function next(): void {
        $this->currentIndex++;
    }

    public function rewind(): void {
        $this->currentIndex=0;
    }

    /**
     * funkcija valid se koristi u slucaju da smo kod next() metode premasili 
     * broj max broja knjiga
     * 
     * @return bool
     */
    public function valid(): bool {
        //return isset($this->books[$this->currentIndex]);  // ovdje je greska
        return isset($this->polica[$this->currentIndex]);  // ovdje je greska
    }
}

