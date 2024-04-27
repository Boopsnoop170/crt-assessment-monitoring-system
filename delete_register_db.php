<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register_db";
$port = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// Get the ID from the form
$id = $_POST['id'];

// Transfer the data to the delete_learners table
$sql = "INSERT INTO delete_learners (learner_id, lastname, firstname, middlename, courses, specialization, image, status) 
        SELECT learner_id, lastname, firstname, middlename, courses, specialization, image, status
        FROM learners 
        WHERE id = $id";
$conn->query($sql);

// Delete the data from the learners table
$sql = "DELETE FROM learners WHERE id = $id";
$conn->query($sql);

// Close the database connection
$conn->close();

// Redirect back to the main page
header('Location: admin_show_register_db.php');
exit;
?>
