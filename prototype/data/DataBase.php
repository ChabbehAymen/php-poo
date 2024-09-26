<?php
require_once(dirname(__FILE__) ."/../entitise/Book.php");

class DataBase
{
    public array $books;

    public function __construct() {
        $data = $this->getData();
        if($data)
        {
            $this->books = $data->books;
        }else $this->books = array();
    }
    /**
     * gets data form databse
     * @return DataBase
     */
    private function getData(): DataBase|bool
    {
        $filePath = dirname(__FILE__).'/../data/database.txt';
        $data = file_get_contents($filePath);
        if(!$data) return false;
        $data = unserialize($data);
        return $data;
    }
    /**
     * set data in the database
     * @return void
     */
    private function setData(): void 
    {
        $filePath = dirname(__FILE__).'/../data/database.txt';
        $serData = serialize($this);
        file_put_contents($filePath, $serData);
    }

    public function save(): void
    {
        $this->setData();
    }
    
}
