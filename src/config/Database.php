<?php

namespace App\Config;

use PDO;
use PDOException;

class Database {
    private $host;
    private $port;
    private $dbName;
    private $username;
    private $password;
    private $conn;

    public function __construct() {
        $this->host = getenv('DB_HOST') ?: 'php_db';
        $this->port = getenv('DB_PORT') ?: '3306';
        $this->dbName = getenv('DB_NAME') ?: 'ecommerce';
        $this->username = getenv('DB_USER') ?: 'root';
        $this->password = getenv('DB_PASSWORD') ?: '1234';
        $this->connect();
    }

    public function connect() {
        try {
            $this->conn = new PDO("mysql:host={$this->host}:{$this->port};dbname={$this->dbName}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function query($sql, $params = array()) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
