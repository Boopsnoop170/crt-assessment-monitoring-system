<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register_db";
$port = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Decode the JSON data sent in the request body
    $data = json_decode(file_get_contents("php://input"));

    // Extract data from the JSON object
    $learnerID = $data->learnerID;
    $assessmentDate = $data->assessmentDate;
    $qualification = "HM: " . $data->qualification; // Add "HM:" prefix

    // Insert the data into another table in the database
    $insertQuery = "INSERT INTO graduate_report (learnerID, assessmentDate, qualification) VALUES ('$learnerID', '$assessmentDate', '$qualification')";
    $insertResult = mysqli_query($conn, $insertQuery);

    // Check if the insertion was successful
    if ($insertResult) {
        // Delete the data from the original table
        $deleteQuery = "DELETE FROM hm WHERE learnerID = '$learnerID'";
        $deleteResult = mysqli_query($conn, $deleteQuery);
        
        if ($deleteResult) {
            // Send a success response
            http_response_code(200);
            echo json_encode(array("message" => "Data transferred successfully and removed from original table."));
        } else {
            // Send an error response if deletion fails
            http_response_code(500);
            echo json_encode(array("message" => "Failed to remove data from original table."));
        }
    } else {
        // Send an error response if insertion fails
        http_response_code(500);
        echo json_encode(array("message" => "Failed to transfer data to new table."));
    }
} else {
    // Send an error response if the request method is not POST
    http_response_code(405);
    echo json_encode(array("message" => "Method Not Allowed"));
}
?>
