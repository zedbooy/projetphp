<?php

class Connection {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function createDatabase($dbName) {
        $sql = "CREATE DATABASE $dbName";
        if ($this->conn->query($sql) === TRUE) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $this->conn->error;
        }
    }

    function selectDatabase($dbName) {
        if ($this->conn->select_db($dbName)) {
            echo "Database selected successfully";
        } else {
            echo "Error selecting database: " . $this->conn->error;
        }
    }

    function createTable($query) {
        if ($this->conn->query($query) === TRUE) {
            echo "Table created successfully";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }
    }
}
?>
