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

// Get input data from the form
$email = $_POST['email'];
$password = $_POST['password'];

// echo $email;
// echo $password;
// // Prepare and execute SQL query to check email and fetch the corresponding password
$sql = "SELECT password FROM users WHERE email ='$email' and password='$password' ";
$res=mysqli_query($conn,$sql);
$i=0;
while ($d=mysqli_fetch_row($res))
{
    $i++;
}
if ($i>0)
{

    header("Location: ../index.html");
    
}
else
{
    echo "INCORECT ID AND PASSWORD";
}
// $stmt = $conn->prepare($sql);

// if (!$stmt) {
//     die("SQL error: " . $conn->error);
// }

// $stmt->bind_param("s", $email);
// $stmt->execute();
// $stmt->store_result();

// if ($stmt->num_rows > 0) {
//     $stmt->bind_result($hashed_password);
//     $stmt->fetch();

//     // Verify the entered password with the stored hashed password
//     if (password_verify($password, $hashed_password)) {
//         echo "Login successful! Welcome!";
//         // Redirect to the dashboard or another page
//        
//     } else {
//         echo "Incorrect password.";
//     }
// } else {
//    
// }

// $stmt->close();
// $conn->close();
?>
