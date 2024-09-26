<?php
require_once(dirname(__FILE__) ."/../data/DataBase.php");
class BookDao
{
    private $dataBase;

    public function __construct() {
        $this->dataBase = new DataBase();
    }

    public function addBook(Book $book) 
    {
        $this->dataBase->books[]=$book;
        $this->dataBase->save();
    }
    public function getBooks(): array 
    {
        return $this->dataBase->books;
    }

    public function deleteBook(string $bookId): void
    {
        $newArry =array_filter($this->dataBase->books, function($book) use ($bookId) 
        {
            return $book->getTitle() !== $bookId;
        });
        $this->dataBase->books = $newArry;
        $this->dataBase->save();
    }
    
}
