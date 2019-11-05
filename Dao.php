<?php
// Data Access Object
class DAO {
    private $host = "localhost";
    private $dbname = "astro";
    private $username = "root";
    private $password = "";
    
    public function authenticate($username, $password) {
        $tableName = "users";
        $connection = $this->getConnection();
        $query = $connection->prepare(
            "SELECT password
            FROM $tableName
            WHERE username = :username"
        );
        $query->bindParam(":username", $username);
        $result = $query->execute();
        $row = $query->fetch();
        $hashedPassword = $row["password"];
        if(password_verify($password, $hashedPassword)) {
            return true;
        }
        return false;
    }
    
    public function createUser($name, $username, $email, $password) {
        try {
            $tableName = "users";
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $connection = $this->getConnection();
            $query = $connection->prepare(
                "INSERT INTO $tableName
                (email, name, username, password)
                VALUES
                (:email, :name, :username, :password)"
            );
            $query->bindParam(":email", $email);
            $query->bindParam(":name", $name);
            $query->bindParam(":username", $username);
            $query->bindParam(":password", $hashedPassword);
            $query->execute();
        }
        catch(Exception $error) {
            echo "Account Creation Failed: " . $error->getMessage();
        }
    }
    
    public function getConnection() {
        try {
            $pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->username,
                $this->password
            );
            return $pdo;
        }
        catch(PDOException $error) {
            echo "Connection Failed: " . $error->getMessage();
        }
    }
    
    public function getPlanetaryData($columns) {
        $tableName = "planets";
        $connection = $this->getConnection();
        $query = $connection->prepare(
            "SELECT $columns
            FROM $tableName
            ORDER BY RAND()
            LIMIT 4"
        );
        $result = $query->execute();
        $rows = $query->fetchAll();
        return $rows;
    }
    
    public function getScores() {
        $tableName = "scores";
        $connection = $this->getConnection();
        $query = "SELECT * FROM $tableName ORDER BY score DESC";
        return $connection->query($query);
    }
    
    public function isUser($username) {
        $tableName = "users";
        $connection = $this->getConnection();
        $query = $connection->prepare(
            "SELECT 1
            FROM $tableName
            WHERE username = :username"
        );
        $query->bindParam(":username", $username);
        $result = $query->execute();
        $row = $query->fetchColumn();
        if($row) {
            return true;
        }
        return false;
    }
    
    public function submitScore($username, $score) {
        $tableName = "scores";
        $connection = $this->getConnection();
        $query = $connection->prepare(
            "INSERT INTO $tableName
            (username, score)
            VALUES(:username, :score)"
        );
        $query->bindParam(":username", $username);
        $query->bindParam(":score", $score);
        $result = $query->execute();
    }
}