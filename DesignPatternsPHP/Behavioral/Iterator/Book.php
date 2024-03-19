<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Iterator;

use Exception;

interface Comparable {
    public function compareTo($other);
}

class Book implements Comparable
{
    private float $price=5;

    public function getPrice(): float
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        return $this->price=$price;
    }
    public function __construct(private string $title, private string $author)
    {
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthorAndTitle(): string
    {
        return $this->getTitle() . ' by ' . $this->getAuthor();
    }

    public function compareTo($other) {  // other je class Book
        if ($other instanceof Book) {
            if ($this->price < $other->getPrice()) {
                return -1;
            } elseif ($this->price > $other->getPrice()) {
                return 1;
            } else {
                return 0;
            }
        } else {
            throw new Exception("Invalid comparison object.");
        }
    }
}
