<?php 


namespace Core;


use PDO; 
use PDOStatement;
use PDOException;


class Database {

    protected PDO $conn;
    protected PDOStatement $stmt;


    public function __construct()
    {
        $config = http_build_query(require base_path("config.php"), "", ";");
        $this->conn = new PDO("mysql:{$config}");

        // Set Attributes
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }


    public function query($query, array $params = [])
    {
        $this->stmt = $this->conn->prepare($query);
        $this->stmt->execute($params);
    }


    public function find($stmt)
    {
        $this->query($stmt);
    }
}

