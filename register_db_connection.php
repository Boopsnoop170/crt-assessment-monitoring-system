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

// Get the form data
$learner_id = $_POST['learner_id'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
$image = $_FILES['image']['name'];
$courses = $_POST['courses'];

// Move the uploaded file to a server directory
$target_dir = "uploads/";
$target_file = $target_dir . basename($image);
move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

// Insert the data into the database with a pending status
$status = "Pending"; // Status for pending approval

// Check if specialization is provided, if not, set it to an empty string
$specializations = isset($_POST['specializations']) ? implode(", ", $_POST['specializations']) : '';

$sql = "INSERT INTO learners (learner_id, lastname, firstname, middlename, password, image, courses, specialization, status) 
        VALUES ('$learner_id', '$lastname', '$firstname', '$middlename', '$password', '$image', '$courses', '$specializations', '$status')";

if ($conn->query($sql) === TRUE) {
    // Redirect to the registration page with a success message
    header("Location: login.php?success=1");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
