<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form fields
    $learnerID = $_POST["learnerID"];
    $assessmentDate = isset($_POST["assessmentDate"]) ? $_POST["assessmentDate"] : null; // Check if the field is set
    $qualification = $_POST["qualification"];
    $status = "Pending"; // Set status to "Pending"

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

    // Prepare SQL statement to insert learner data into the database with status "Pending"
    $sql = "INSERT INTO bsais (learnerID, assessmentDate, qualification, status) 
            VALUES ('$learnerID', " . ($assessmentDate ? "'$assessmentDate'" : "NULL") . ", '$qualification', '$status')"; // Check if the field is set

    if ($conn->query($sql) === TRUE) {
        // Redirect to index.php after successful submission
        header("Location: index.php");
        exit();
    } else {
        // If there is an error, display an error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
} else {
    // If the form is not submitted, redirect back to the page
    header("Location: bsais_schedule.php");
    exit();
}
?>
