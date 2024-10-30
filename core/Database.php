<?php

namespace App\Core;

use PDO;
use PDOException;

class Database {
    private $host;
    private $dbName;
    private $username;
    private $password;
    private $conn;

    public function __construct() {
        $this->host = getenv('DB_HOST') ?: 'localhost';
        $this->dbName = getenv('DB_NAME') ?: 'my_database';
        $this->username = getenv('DB_USER') ?: 'my_user';
        $this->password = getenv('DB_PASSWORD') ?: 'secret';

        $this->connect();
    }

    public function connect() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
