<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_accounts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$user_name = $_POST['username'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];
$mobile = $_POST['mobile'];
$user_password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt password

// Insert data into database
$sql = "INSERT INTO users (username, email, gender, birthdate, mobile, password) VALUES ('$user_name', '$email', '$gender', '$birthdate', '$mobile', '$user_password')";

if ($conn->query($sql) === TRUE) {
    echo "Account created successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
