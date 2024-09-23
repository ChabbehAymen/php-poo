<?php
/**
 *
 */
class DataBase
{
	private $books = [];
	private $authors = [];
	private $readers = [];
    private $filePath;

    public function __construct()
    {
        $this->filePath = dirname(__FILE__).'/../data/data.txt';
        $data = $this->fetch();
        var_dump($data);
        if($data)
        {
        $this->books = $data->getData('books');
        $this->authors = $data->getData('authors');
        $this->readers = $data->getData('readers');
    }
    }

    private function fetch()
    {
        return unserialize(file_get_contents($this->filePath));
    }
    private function setData(): bool 
    {
        return file_put_contents($this->filePath, serialize($this));
    }
    /**
     * Summary of getData
     * @param string $table
     * @return array
     */
    public function getData(string $table): Array
    {
        if($table === 'books') return $this->books;
        if($table === 'authors') return $this->authors;
        else return $this->readers;
    }
    /**
     * Summary of push
     * @param object $item
     * @param string $table
     * @return void
     */
    public function push(object $item, string $table): void 
    {
        if($table === 'books') array_push($this->books, $item);
        if($table === 'authors') array_push($this->authors, $item);
        if($table === 'readers') array_push($this->readers, $item);
    }
    /**
     * save changes into file
     * @return bool
     */
    public function save(): bool
    {
        return $this->setData();
    }
}