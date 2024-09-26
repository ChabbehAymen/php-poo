<?php
require_once(dirname(__FILE__) ."/../data/DataBase.php");
class BookDao
{
    private $dataBase;

    public function __construct() {
        $this->dataBase = new DataBase();
    }
    /**
     * accesses data base and inserts a book
     * @param Book $book
     * @return void
     */
    public function addBook(Book $book) 
    {
        $this->dataBase->books[]=$book;
        $this->dataBase->save();
    }
    /**
     * accesses data base and gets all books
     * @return array
     */
    public function getBooks(): array 
    {
        return $this->dataBase->books;
    }
    /**
     * accesses data base and deltes books
     * @param string $bookId
     * @return void
     */
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
