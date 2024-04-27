<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register_db";
$port = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch learner data from the database
$sql = "SELECT * FROM hm";
$result = $conn->query($sql);

$learnerData = array();

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $learnerData[] = $row;
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();

// Output learner data as JSON
header('Content-Type: application/json');
echo json_encode($learnerData);
?>
