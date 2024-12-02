<?php
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
$user = $_POST['username'];
$pass = $_POST['password'];

// SQL query to fetch user data
$sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, redirect to a welcome page or dashboard
    header("Location: welcome.html");
} else {
    // User not found, show error message
    echo "Invalid username or password.";
}

$conn->close();
?>
