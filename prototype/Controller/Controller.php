<?php
require_once(dirname(__FILE__) ."/../Repository/DataManager.php");

class Controller
{
    private  $dataManager;
    private $data;

    public function __construct() {
        $this->dataManager = new DataManager(); //use of unknown class: 'DataManager'
        $this->data = $this->dataManager->getData();
    }

    protected function add($_data):bool{
        array_push($this->data, $_data);
        return $this->dataManager->setData($this->data);
    }

    // For the Prototype we will be only adding
    
}
