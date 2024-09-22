<?php
require_once dirname(dirname(__FILE__))."/dataAccess/DataAccess.php";
class ReaderDao extends DataAccess
{
    function __construct() {
        parent::construct('readers');
    }
}