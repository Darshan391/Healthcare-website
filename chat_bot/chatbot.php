<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fetch";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['message'])) {
    $user_message = $conn->real_escape_string($_POST['message']);
    $sql = "SELECT bot_response FROM chatbot_responses WHERE user_message LIKE '%$user_message%' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['bot_response'];
    } else {
        echo "I'm sorry, I didn't understand that. Can you please rephrase?. Either Fill feedback Form";
    }
}

$conn->close();
?>