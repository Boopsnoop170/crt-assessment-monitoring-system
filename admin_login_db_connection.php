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
$password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE Account_name = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $Account_name);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row["password"])) {
        header("Location: admin_report.php");
        exit;
    } else {
        echo "Invalid password";
    }
} else {
    echo "Account not found";
}

$stmt->close();
$conn->close();
?>