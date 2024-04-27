<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_db";
$port = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

$Account_name = $_POST['Account_name'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO admin (Account_name, password)
VALUES (?,?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $Account_name, $password);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: ". $stmt->error;
}

$stmt->close();
$conn->close();
?>