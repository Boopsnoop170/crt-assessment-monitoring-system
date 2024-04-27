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

// Fetch existing Learner IDs from the database table
$sql = "SELECT learner_id FROM learners";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    $learner_ids = [];
    while($row = $result->fetch_assoc()) {
        $learner_ids[] = $row["learner_id"];
    }
    // Output Learner IDs as JSON
    echo json_encode($learner_ids);
} else {
    echo "0 results";
}
$conn->close();
?>
