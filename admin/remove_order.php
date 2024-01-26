<?php
require_once("..//config.php");

if(isset($_POST['order_id'])) {
    $id = $_POST['order_id'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM orders WHERE order_id = ?");
    $stmt->bind_param("i", $id);

    $stmt = $conn->prepare("DELETE FROM status WHERE order_id = ?");
    $stmt->bind_param("i", $id);

    $query_remove_items = "DELETE FROM order_items WHERE order_id = '$id'";
    $query_run_items = mysqli_query($conn, $query_remove_items);

    if($stmt->execute()) {
        // Deletion successful
        header("Location: order_management.php"); // Redirect to the appropriate page
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
