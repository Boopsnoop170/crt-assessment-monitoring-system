<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register_db";
$port = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the learner ID from the input field
$learner_id = $_POST['learner_id'];

// Write a SQL query to retrieve data from the "learners" table for the specified learner ID
$sql = "SELECT * FROM learners WHERE learner_id = $learner_id";

// Execute the query and store the result set
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output data of the row
    $row = $result->fetch_assoc();
    echo "<h2>Learner Details</h2>";
    echo "<p>Lastname: " . $row["lastname"] . "</p>";
    echo "<p>Firstname: " . $row["firstname"] . "</p>";
    echo "<p>Middlename: " . $row["middlename"] . "</p>";
    echo "<p>Image: <img src='uploads/" . $row["image"] . "' alt='Learner Image' width='200'></p>";
} else {
    echo "<h2>No learner found with ID $learner_id</h2>";
}

// Close the database connection
$conn->close();