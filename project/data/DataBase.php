<?php
/**
 *
 */
class DataBase
{
	
	private $data;

    private $filePath;
    public function __construct(){
        $this->filePath = dirname(__FILE__).'/../data/data.json';
        $this->data = json_decode(file_get_contents($this->filePath), true);
    }

    public function getData(): Array{
        return $this->data;
    }

    public function setData($_data): bool {
        $file = fopen($this->filePath, 'w');
        fwrite($file, json_encode($_data));
        return fclose($file);
    }
}