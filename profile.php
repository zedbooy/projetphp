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

// Fetch user data
$sql = "SELECT * FROM Clients";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            padding: 30px;
        }
        .profile-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        .profile-container h2 {
            color: #3d9b35;
            margin-bottom: 20px;
        }
        .profile-container table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .profile-container table th, .profile-container table td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        .profile-container table th {
            background-color: #3d9b35;
            color: white;
        }
        .profile-container table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .profile-container a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #3d9b35;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        .profile-container a:hover {
            background-color: #307a2a;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h2>User Profile</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['firstname'] . "</td>";
                    echo "<td>" . $row['lastname'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>";
                    echo "<a href='edit.php?id=" . $row['id'] . "'>Edit</a> ";
                    echo "<a href='delete.php?id=" . $row['id'] . "'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No users found</td></tr>";
            }
            ?>
        </table>
        <a href="indexx.php">Back to Home</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
