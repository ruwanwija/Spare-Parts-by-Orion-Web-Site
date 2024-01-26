<?php
require_once("..//config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];

    // Assuming you have a table named 'status' with columns 'order_id' and 'status'
    $status = "Processing...";
    $sql = "INSERT INTO status (order_id, status) VALUES ('$order_id', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "Delivery status updated successfully";
        header("Location: order_management.php");
    } else {
        echo "Error updating delivery status: " . $conn->error;
    }

    $conn->close();
}
?>
