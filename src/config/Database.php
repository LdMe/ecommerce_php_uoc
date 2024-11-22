<?php

class Database {
    private $host;
    private $port;
    private $dbName;
    private $username;
    private $password;
    private $conn;

    static public $instance;

    public function __construct() {
        $this->host = getenv('DB_HOST') ?: 'php_db';
        $this->port =  '3306';
        $this->dbName = getenv('DB_NAME') ?: 'ecommerce';
        $this->username = getenv('DB_USER') ?: 'root';
        $this->password = getenv('DB_PASSWORD') ?: '1234';
        $this->connect();

    }
    static public function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
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
    public function execute($sql, $params = array()) {
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($params);
    }

    public function getLastInsertId() {
        return $this->conn->lastInsertId();
    }
}
