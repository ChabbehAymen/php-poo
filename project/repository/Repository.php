<?php

abstract class Repository
{
    private DataAccess $dao;
    private Array $data;
    public function __construct(DataAccess $dao) {
        $this->dao = $dao;
        $this->data = $this->dao->getData();
    }

    public function getAll(): array
    {
        return $this->data;
    }

    public function find(int $id): bool | object
    {
        $found = false;
        foreach($this->data as $ob){
            if($ob->id === $id) return $ob;
        }
        return $found;
    }

    public function add(object $ob): bool
    {
        array_push($this->data, $ob);
        return $this->dao->setData($this->data);
    }

    public function remove(int $id): bool
    {
        $this->data = array_filter($this->data, function ($book) use ($id){
            return $book->id !== $id;
        });
        return $this->dao->setData($this->data);
    }
}
