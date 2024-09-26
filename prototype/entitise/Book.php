<?php
class Book
{
    private int $id;
    private string $ISBM;
    private string $title;
    private string $pubdate;

    public function __construct(string $ISBM, string $title, string $pubdate) {
        $this->id = time();
        $this->ISBM = $ISBM;
        $this->title = $title;
        $this->pubdate = $pubdate;
    }
    

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * Get the value of ISBM
     */
    public function getISBM(): string
    {
        return $this->ISBM;
    }

    /**
     * Set the value of ISBM
     */
    public function setISBM(string $ISBM): self
    {
        $this->ISBM = $ISBM;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of pubdate
     */
    public function getPubdate(): string
    {
        return $this->pubdate;
    }

    /**
     * Set the value of pubdate
     */
    public function setPubdate(string $pubdate): self
    {
        $this->pubdate = $pubdate;

        return $this;
    }
}
