<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $learnerID = $_POST["learnerID"];
    $qualification = $_POST["qualification"];
    $status = $_POST["status"];
    $assessmentDate = $_POST["assessmentDate"];
    $action = $_POST["action"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "register_db";
    $port = 3307;

    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($action == "approve") {
        $sql = "UPDATE hm SET status='Approved', assessmentDate='$assessmentDate' WHERE learnerID='$learnerID'";
    } elseif ($action == "reject") {
        $sql = "UPDATE hm SET status='Rejected', assessmentDate=NULL WHERE learnerID='$learnerID'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
    // Redirect to admin_schedule_process.php after updating data
    header("Location: admin_schedule_process.php");
    exit();
} else {
    header("Location: hm_schedule.php");
    exit();
}
?>