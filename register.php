<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection details
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password
$dbname = "usersemsihub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || substr($email, -12) !== '@emsi-edu.ma') {
    die("Invalid email address. Only @emsi-edu.ma emails are allowed.");
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// SQL query to insert user data
$sql = "INSERT INTO Clients (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    // Registration successful, redirect to sign-in page
    header("Location: signin.html");
    exit();
} else {
    // Registration failed, show error message
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
