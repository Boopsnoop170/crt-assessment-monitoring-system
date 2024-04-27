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
$id = $_POST['id'];
$learner_id = $_POST['learner_id'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$courses = $_POST['courses'];

// Handle specialization field
$specializations = isset($_POST['specializations']) ? implode(", ", $_POST['specializations']) : '';

// Check if a new image file is uploaded
if ($_FILES['image']['name'] != '') {
    // Move the uploaded file to a server directory
    $target_dir = "uploads/";
    $image = $_FILES['image']['name'];
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    // Update the record in the database with the new image and specialization
    $sql = "UPDATE learners SET learner_id='$learner_id', lastname='$lastname', firstname='$firstname', middlename='$middlename', courses='$courses', specialization='$specializations', image='$image' WHERE id=$id";
} else {
    // Update the record in the database without changing the image and with specialization
    $sql = "UPDATE learners SET learner_id='$learner_id', lastname='$lastname', firstname='$firstname', middlename='$middlename', courses='$courses', specialization='$specializations' WHERE id=$id";
}

if ($conn->query($sql) === TRUE) {
    // Redirect to the registration page with a success message
    header("Location: admin_show_register_db.php?success=1");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
