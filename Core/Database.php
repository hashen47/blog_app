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
        try 
        {
            $config = http_build_query(require base_path("config.php"), "", ";");
            $this->conn = new PDO("mysql:{$config}");

            // Set Attributes
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            die();
        }
    }


    public function query($query, array $params = [])
    {
        $this->stmt = $this->conn->prepare($query);
        $this->stmt->execute($params);
    }


    public function find($stmt, $params)
    {
        $this->query($stmt);
        $this->stmt->fetch();
    }


    public function findAll($stmt, $params = []) : array
    {
        $this->query($stmt,$params);
        return $this->stmt->fetchAll();
    }
}

