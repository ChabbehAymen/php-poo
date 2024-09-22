<?php
require_once dirname(dirname(__FILE__))."/dataAccess/DataAccess.php";
class BookDao extends DataAccess
{
    function __construct() {
        parent::construct('books');
    }
}