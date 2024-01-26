<?php
require_once("..//config.php");

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM user WHERE user_id = ?");
    $stmt->bind_param("i", $id);

    if($stmt->execute()) {
        // Deletion successful
        header("Location: user_management.php"); // Redirect to the appropriate page
        exit();
    } else {
        // Deletion failed
        echo "Error deleting item: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
