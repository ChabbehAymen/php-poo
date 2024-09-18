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

    protected function addAutor($_data):bool{}

    protected function find($title):Array{}

    protected function remove($_data):bool{}

    protected function update($_data): bool{}

    
}
