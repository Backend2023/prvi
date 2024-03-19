<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Iterator;

use Countable;
use Iterator;

class BookList implements Countable, Iterator
{
    /**
     * @var Book[]
     */
    private array $books = [];
    private int $currentIndex = 0;

    public function getBooks()
    {
        return $this->books;
    }
    public function addBook(Book $book)
    {
        $this->books[] = $book;
    }

    public function removeBook(Book $bookToRemove)
    {
        foreach ($this->books as $key => $book) {
            if ($book->getAuthorAndTitle() === $bookToRemove->getAuthorAndTitle()) {
                unset($this->books[$key]);
            }
        }

        $this->books = array_values($this->books);
    }

    public function count(): int
    {
        return count($this->books);
    }

    public function current(): Book
    {
        return $this->books[$this->currentIndex];
    }

    public function key(): int
    {
        return $this->currentIndex;
    }

    public function next(): void
    {
        $this->currentIndex++;
    }

    public function rewind(): void
    {
        $this->currentIndex = 0;
    }

    public function valid(): bool
    {
        return isset($this->books[$this->currentIndex]);
    }

    // mozemo koristiti spaceship operator
    /*
    <=>	Spaceship	
    Returns an integer less than, equal to, or greater than zero, 
    depending on if $x is less than, equal to, or greater than $y. 
    Introduced in PHP 7.
    */
    public function sortByPrice(): void
    {
        usort($this->books, function (Book $book1, Book $book2) {
            return $book1->getPrice() <=> $book2->getPrice();
        });
    }
    public function sortByPrice2(): void
    {
        usort($this->books, function (Book $book1, Book $book2) {
            return $book1->compareTo($book2);
        });
    }

    //sortiramo po naslovu
    public function sortByTitle(): void
    {
        usort($this->books, function (Book $book1, Book $book2) {
            return strcmp($book1->getTitle(), $book2->getTitle());
        });
    }
}
