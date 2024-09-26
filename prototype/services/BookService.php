<?php
require_once(dirname(__FILE__) ."/../dataAccess/BookDao.php");
class BookService
{
    private $dao;

    public function __construct() {
        $this->dao = new BookDao();
    }
    public function addBook(Book $book): void
    {
        $this->dao->addBook($book);
    }
    /**
     * get array of booksform dao
     * @return array
     */
    public function getBooks(): array
     {
        return $this->dao->getBooks();
    }
    /**
     * delete book from db
     * @param int $bookTitle
     * @return void
     */
    public function deleteBook(string $bookTitle): void
    {
        $this->dao->deleteBook($bookTitle);
    }
}
