<?php

class Client {

    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $reg_date;

    public static $errorMsg = "";
    public static $successMsg = "";

    public function __construct($firstname, $lastname, $email, $password) {
        // Initialize the attributes of the class with the parameters, and hash the password
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function insertClient($tableName, $conn) {
        // Insert a client in the database, and give a message to $successMsg and $errorMsg
        $query = "INSERT INTO $tableName (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)";
        $stmt = $conn->prepare($query);

        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);

        if ($stmt->execute()) {
            self::$successMsg = "Client added successfully.";
        } else {
            self::$errorMsg = "Error adding client: " . $stmt->errorInfo()[2];
        }
    }

    public static function selectAllClients($tableName, $conn) {
        // Select all the clients from the database, and insert the rows results in an array $data[]
        $query = "SELECT * FROM $tableName";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $data = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        return $data;
    }

    public static function selectClientById($tableName, $conn, $id) {
        // Select a client by id, and return the row result
        $query = "SELECT * FROM $tableName WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function updateClient($client, $tableName, $conn, $id) {
        $query = "UPDATE $tableName SET firstname = :firstname, lastname = :lastname, email = :email, password = :password WHERE id = :id";
        $stmt = $conn->prepare($query);

        $stmt->bindParam(':firstname', $client->firstname);
        $stmt->bindParam(':lastname', $client->lastname);
        $stmt->bindParam(':email', $client->email);
        $stmt->bindParam(':password', $client->password);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            self::$successMsg = "Client updated successfully.";
            header("Location: read.php");
        } else {
            self::$errorMsg = "Error updating client: " . $stmt->errorInfo()[2];
        }
    }

    public static function deleteClient($tableName, $conn, $id) {
    
        $query = "DELETE FROM $tableName WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            self::$successMsg = "Client deleted successfully.";
            header("Location: read.php");
        } else {
            self::$errorMsg = "Error deleting client: " . $stmt->errorInfo()[2];
        }
    }
}

?>
