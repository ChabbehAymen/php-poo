<?php
require_once dirname(dirname(__FILE__))."/dataAccess/DataAccess.php";
require_once dirname(dirname(__FILE__))."/entities/Reader.php";
class ReaderDao extends DataAccess
{
    function __construct() {
        parent::construct('readers');
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
            $reader = new Reader(cardNumber:$row['cardNumber'], name:$row['name'], lastName:$row['lastName'], address: $row['address']);
            array_push($this->data, $reader);
        }
    }
}