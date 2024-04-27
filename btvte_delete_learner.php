<?php
// Check if the learner ID parameter is provided
if (isset($_GET['id'])) {
    // Database connection parameters
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

    // Prepare and execute the DELETE statement
    $id = $_GET['id'];
    $sql = "DELETE FROM btvte WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Check if deletion was successful
    if ($stmt->affected_rows > 0) {
        echo "Learner deleted successfully";
    } else {
        echo "Error: Failed to delete learner";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If no learner ID parameter is provided
    echo "Error: No learner ID provided";
}
?>
