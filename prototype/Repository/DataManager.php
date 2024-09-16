<?php
class DataManager{

    private $data;
    public function __construct(){
        // TODO read data from The Json File and assign it to the local var
    }

    public function getData(): Array{
        return $this->data;
    }

    public function setData($_data): bool {
        return true;
    }
}