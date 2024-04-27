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
               JOIN act_bsit ON learners.learner_id = act_bsit.learnerID
               SET learners.specialization = CONCAT_WS(', ', learners.specialization, CONCAT('BSIT: ', act_bsit.qualification))";
if ($conn->query($sql_update) === TRUE) {
    echo "Learner successfully graduated!";

    // Now, delete the rows from act_bsit
    $sql_delete = "DELETE FROM act_bsit WHERE learnerID IN (SELECT learner_id FROM learners)";
    if ($conn->query($sql_delete) === TRUE) {
        echo "!";
    } else {
        echo "Error deleting rows from act_bsit: " . $conn->error;
    }
} else {
    echo "Error updating specialization: " . $conn->error;
}

// Close database connection
$conn->close();
?>
