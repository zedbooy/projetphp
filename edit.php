<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.html");
    exit();
}

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

// Get user ID from URL
$id = $_GET['id'];

// Fetch user data
$sql = "SELECT * FROM Clients WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die("User not found");
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password if it's not empty
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE Clients SET firstname='$firstname', lastname='$lastname', email='$email', password='$hashed_password' WHERE id=$id";
    } else {
        $sql = "UPDATE Clients SET firstname='$firstname', lastname='$lastname', email='$email' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: profile.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .edit-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }
        .edit-container h2 {
            color: #3d9b35;
            margin-bottom: 20px;
        }
        .edit-container form {
            display: flex;
            flex-direction: column;
        }
        .edit-container form input {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .edit-container form button {
            padding: 10px;
            background-color: #3d9b35;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .edit-container form button:hover {
            background-color: #307a2a;
        }
    </style>
</head>
<body>
    <div class="edit-container">
        <h2>Edit User</h2>
        <form method="POST" action="">
            <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>" required>
            <input type="text" name="lastname" value="<?php echo $row['lastname']; ?>" required>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
            <input type="password" name="password" placeholder="New Password (leave empty to keep current)">
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
