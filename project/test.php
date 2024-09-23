<?php
function fetch(){
    return new DataBase();
}


$books = fetch()->getData("books");
fetch()->push(new Book('', '', ''), 'books');