<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"]) && ($_POST["action"] == "approve" || $_POST["action"] == "reject")) {
        $learner_id = $_POST["learner_id"];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "register_db";
        $port = 3307;

        $conn = new mysqli($servername, $username, $password, $dbname, $port);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $status = ($_POST["action"] == "approve") ? "Approved" : "Pending";
        $sql = "UPDATE learners SET status='$status' WHERE learner_id='$learner_id'";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            header("Location: admin_process.php");
            exit();
        } else {
            echo "Error updating status: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Invalid action.";
    }
} else {
    echo "No data received.";
}
?>
