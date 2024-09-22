<?php
require_once(dirname(dirname(__FILE__)) . "/repository/BooksRepo.php");
require_once(dirname(dirname(__FILE__)) . "/data/dataAccess/BookDao.php");

class Controller
{
    private BooksRepo $booksRepo;

    public function __construct() {
        $this->booksRepo = new BooksRepo(new BookDao());
    }
    /**
     * Gets all Books from data data base
     * @return array
     */
    public function getBooks(): array
    {
        return $this->booksRepo->getAll();
    }
    /**
     * Create new book object and insert it to db
     * @return bool
     */
    public function CreateBook():bool
    {
        return true;
    }
}