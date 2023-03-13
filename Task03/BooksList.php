<?php

namespace App;

use App\Book;

class BooksList
{
    private array $books = [];

    public function add(Book $book)
    {
        $this->books[] = $book;
    }

    public function count(): int
    {
        return count($this->books);
    }

    public function get(int $n): Book
    {
        return $this->books[$n];
    }

    public function store(string $fileName): bool
    {
        file_put_contents($fileName, serialize($this->books));

        return true;
    }

    public function load(string $fileName): bool
    {
        if (!file_exists($fileName)) {
            echo "Файл {$fileName} не существует!";
            return false;
        }

        $this->books = unserialize(file_get_contents($fileName));

        return true;
    }
}
