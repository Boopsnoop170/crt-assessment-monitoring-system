<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register_db";
$port = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

$learner_id = $_POST['learner_id'];
$password_input = $_POST['password'];

$sql = "SELECT * FROM learners WHERE learner_id = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("s", $learner_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["password"];
        $approval_status = $row["status"]; // Get the approval status from the database

        if ($approval_status == "Approved") {
            if (password_verify($password_input, $hashed_password)) {
                // Start session and set user as logged in, or other appropriate action
                session_start();
                $_SESSION['learner_id'] = $learner_id;
                // Redirect to main page or dashboard
                header("Location: index.php");
                exit;
            } else {
                echo "Invalid password";
            }
        } else {
            echo "Your account is not yet approved. Please wait for approval.";
        }
    } else {
        echo "Account not found";
    }

    $stmt->close();
} else {
    // Handle SQL query preparation error
    echo "SQL query preparation error: ".$conn->error;
}

$conn->close();
?>
