<?php
session_start();

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
$email = $_POST['email'];
$password = $_POST['password'];

// SQL query to fetch user data
$sql = "SELECT * FROM Clients WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verify the password
    if (password_verify($password, $row['password'])) {
        // Password is correct, start session and redirect to main page
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_email'] = $row['email'];
        header("Location: indexx.php");
        exit();
    } else {
        // Password is incorrect
        echo "Invalid email or password.";
    }
} else {
    // User not found
    echo "Invalid email or password.";
}

$conn->close();
?>
