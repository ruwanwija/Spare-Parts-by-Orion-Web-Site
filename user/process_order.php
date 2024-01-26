<?php
require_once("config.php");

session_start();

if (!isset($_SESSION['current_user_name'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['buy'])) {
    // Generate a unique order ID
    $order_id = uniqid();

    // Calculate total and discount
    $total = 0;
    $discount = 0;
    foreach ($_SESSION["cart"] as $value) {
        $total += $value["quantity"] * $value["price"];
    }

    // Insert order details
    $insert_order_query = "INSERT INTO orders (order_id, user_name, total) 
                          VALUES ('$order_id', '{$_SESSION['current_user_name']}', $total)";
    mysqli_query($conn, $insert_order_query);

    // Insert individual items
    foreach ($_SESSION["cart"] as $value) {
        $product_name = $value["name"];
        $quantity = $value["quantity"];
        $subtotal = $value["quantity"] * $value["price"];

        $query = "INSERT INTO order_items (item_id,order_id, product_name, quantity, subtotal) 
                  VALUES ('.','$order_id', '$product_name', $quantity, $subtotal)";
        mysqli_query($conn, $query);
    }
    $update_product_query = "UPDATE products SET quantity = quantity - $quantity WHERE name = '$product_name'";
    mysqli_query($conn, $update_product_query);
    // Clear the cart after purchase
    unset($_SESSION["cart"]);

    // Redirect to a confirmation page
    header("Location: index.php");
    exit();
}
?>
