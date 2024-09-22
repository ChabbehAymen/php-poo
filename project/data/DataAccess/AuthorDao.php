<?php
require_once dirname(dirname(__FILE__))."/dataAccess/DataAccess.php";
class AuthorDao extends DataAccess
{
    function __construct() {
        parent::construct('authors');
    }
}