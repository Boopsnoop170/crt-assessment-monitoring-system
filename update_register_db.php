<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        header("Location: update_register.php?id=$id");
        exit();
    } else {
        echo "Error: ID not provided.";
    }
}
?>
