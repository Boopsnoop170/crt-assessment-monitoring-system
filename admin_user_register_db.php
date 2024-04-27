<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_db";
$port = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

$Account_name = $_POST['Account_name'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (Account_name, password)
VALUES (?,?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $Account_name, $password);

if ($stmt->execute()) {
    // Display "Account Successfully Registered" alert
    echo "<script>alert('Account Successfully Registered');</script>";
    // Redirect to login.php after 2 seconds
    echo "<script>setTimeout(function() { window.location.href = 'login.php'; }, 0000);</script>";
} else {
    echo "Error: ". $stmt->error;
}

$stmt->close();
$conn->close();
?>
