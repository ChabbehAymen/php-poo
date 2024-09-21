<?php 

class Book
{
    private int $id;
    private String $ISBN;
    private String $title;
    private String $pubDate;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  void
     */ 
    public function setId($id): Void
    {
        $this->id = $id;

    }

    /**
     * Get the value of ISBN
     */ 
    public function getISBN()
    {
        return $this->ISBN;
    }

    /**
     * Set the value of ISBN
     *
     * @return  void
     */ 
    public function setISBN($ISBN): Void
    {
        $this->ISBN = $ISBN;

    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  void
     */ 
    public function setTitle($title): void
    {
        $this->title = $title;

    }

    /**
     * Get the value of pubDate
     */ 
    public function getPubDate()
    {
        return $this->pubDate;
    }

    /**
     * Set the value of pubDate
     *
     * @return  void
     */ 
    public function setPubDate($pubDate): void
    {
        $this->pubDate = $pubDate;

    }
}

	
