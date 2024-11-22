<?php
require_once "config/Database.php";

class BaseModel {
    protected $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
}