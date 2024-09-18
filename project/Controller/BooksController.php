<?php
require_once(dirname(__FILE__) ."/../Repository/DataManager.php");
require_once(dirname(__FILE__) ."/Controller.php");
class BooksController extends Controller
{
    public function addBook($data): bool{
        return $this->add($data);
    }
}
