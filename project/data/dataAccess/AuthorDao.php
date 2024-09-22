<?php
require_once dirname(dirname(__FILE__))."/dataAccess/DataAccess.php";
require_once dirname(dirname(__FILE__))."/entities/Author.php";
class AuthorDao extends DataAccess
{
    function __construct() {
        parent::construct('authors');
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
            $author = new Author(name:$row['name'], lastName:$row['lastName'], nationality:$row['nationality']);
            array_push($this->data, $author);
        }
    }
}