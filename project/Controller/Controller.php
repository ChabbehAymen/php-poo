<?php
require_once(dirname(__FILE__) . "/../Repository/DataManager.php");

class Controller
{
    private $dataManager;
    private $data;

    public function __construct()
    {
        $this->dataManager = new DataManager();
        $this->data = $this->dataManager->getData();
    }

    protected function add($_data): bool
    {
        array_push($this->data, $_data);
        return $this->dataManager->setData($this->data);
    }

    protected function addAutor($_data): bool
    {
        $updated = false;
        foreach ($this->data as $book) {
            if ($book["title"] == $_data["title"]) {
                array_push($this->data['author'], $book['author']);
                return $this->dataManager->setData($this->data);
            }
        }
        return $updated;

    }

    protected function find($title): array|bool
    {
        $found = false;
        foreach ($this->data as $book) {
            if ($book["title"] === $title) {
                return $book;
            }
        }
        return $found;
    }

    protected function remove($title): bool
    {
        $removed = false;
        array_filter($this->data, function ($book) {
            global $title;
            return $book['title'] !== $title;
        });
        return $removed;
    }

    protected function update($_data): bool
    {
    }


}