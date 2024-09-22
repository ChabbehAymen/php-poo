<?php 
require_once dirname(dirname(__FILE__))."/DataBase.php";

abstract class DataAccess
{
    private Array $rowData;
    protected array $data;
    private DataBase $db;
    private String $table;
    function construct(String $table) {
         $this->db = new DataBase();
         $this->rowData = $this->db->getData();
         $this->data = array();
         $this->table = $table;
    }
    /**
     * return row data in form of associative array     * @return array
     */
    protected function getRowData(): array
    {
        return $this->rowData[$this->table];
    }
    /**
     * return data [array of an entity objects]
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): bool{
        $this->rowData[$this->table] = $data;
        return $this->db->setData($data);
    }
}
