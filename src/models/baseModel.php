<?php
require_once $_SERVER['DOCUMENT_ROOT'] ."/config/Database.php";

class BaseModel {
    protected $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
}