<?php
require_once(dirname(__FILE__) ."/../Repository/DataManager.php");

class Controller
{
    private  $dataManager;
    private $data;

    public function __construct() {
        $this->dataManager = new DataManager(); 
        $this->data = $this->dataManager->getData();
    }

    protected function add($_data):bool{
        array_push($this->data, $_data);
        return $this->dataManager->setData($this->data);
    }

    protected function find($title): Array|bool{
        $found = false;
        foreach ($this->data as $book) {
            if ($book["title"] === $title) {
                return $book;
            }
        }
        return $found;
    }

    // For the Prototype we will be only adding
    
}
