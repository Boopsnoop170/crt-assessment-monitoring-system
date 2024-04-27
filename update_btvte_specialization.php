<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register_db";
$port = 3307;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the UPDATE statement with a JOIN
$sql_update = "UPDATE learners
               JOIN btvte ON learners.learner_id = btvte.learnerID
               SET learners.specialization = CONCAT_WS(', ', learners.specialization, CONCAT('BTVTE: ', btvte.qualification))";
if ($conn->query($sql_update) === TRUE) {
    echo "Learner successfully graduated!";

    // Now, delete the rows from btvte
    $sql_delete = "DELETE FROM btvte WHERE learnerID IN (SELECT learner_id FROM learners)";
    if ($conn->query($sql_delete) === TRUE) {
        echo "!";
    } else {
        echo "Error deleting rows from btvte: " . $conn->error;
    }
} else {
    echo "Error updating specialization: " . $conn->error;
}

// Close database connection
$conn->close();
?>
