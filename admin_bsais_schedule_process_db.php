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
        $sql = "UPDATE bsais SET status='Approved', assessmentDate='$assessmentDate' WHERE learnerID='$learnerID'";
    } elseif ($action == "reject") {
        $sql = "UPDATE bsais SET status='Rejected', assessmentDate=NULL WHERE learnerID='$learnerID'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
    header("Location: admin_schedule_process.php");
    exit();
} else {
    header("Location: bsais_schedule.php");
    exit();
}
?>