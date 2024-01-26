<?php
require_once("../config.php");

if(isset($_POST['id']) && isset($_POST['quantity']) && isset($_POST['price'])) {
    $id = $_POST['id'];
    $newQuantity = $_POST['quantity'];
    $newPrice = $_POST['price'];

    // Update product quantity and price in the database
    $updateQuery = "UPDATE products SET quantity='$newQuantity', price='$newPrice' WHERE id='$id'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if($updateResult) {
        echo "Product quantity and price updated successfully!";
        header("Location:product_management.php");   
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
