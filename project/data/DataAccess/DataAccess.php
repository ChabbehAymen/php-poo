<?php 
require_once dirname(dirname(__FILE__))."/DataBase.php";

abstract class DataAccess
{
    private Array $data;
    private DataBase $db;
    private String $table;
    function construct(String $table) {
         $this->db = new DataBase();
         $this->data = $this->db->getData();
         $this->table = $table;
    }

    public function getData(): array{
        return $this->data[$this->table];
    }

    public function setData(array $data): bool{
        $this->data[$this->table] = $data;
        return $this->db->setData($data);
    }
}
