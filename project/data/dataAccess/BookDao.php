<?php
require_once dirname(dirname(__FILE__))."/dataAccess/DataAccess.php";
require_once dirname(dirname(__FILE__))."/entities/Book.php";
class BookDao extends DataAccess
{
    function __construct() {
        parent::construct('books');
        $this->convertToDao();
    }
    /**
     * Helper function that convert the associative array data
     * to an array of an entity objects
     * @return void
     */
    private function convertToDao(): void
    {
        $rowData = $this->getRowData();
        foreach($rowData as $row){
            $book = new Book(ISBN:$row['ISBN'], title:$row['title'], pubDate:$row['pubDate']);
            array_push($this->data, $book);
        }
    }
}