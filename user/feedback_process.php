<?php
session_start(); // Start the session if not started already

require_once("config.php");

// Validate and sanitize user inputs
$pname = mysqli_real_escape_string($conn, $_POST['feedback_product_name']);
$pimage = mysqli_real_escape_string($conn, $_POST['feedback_image']);
$feedback = mysqli_real_escape_string($conn, $_POST['feedback']);
$rating = mysqli_real_escape_string($conn, $_POST['rating']);

// Check if the user is authenticated
if(isset($_SESSION['current_user_name'])) {
    $username = mysqli_real_escape_string($conn, $_SESSION['current_user_name']);

    // Build the SQL query
    $feedback_query = "INSERT INTO feedback(id, product_name, product_image, user_name, feedback, rating) VALUES ('', '$pname', '$pimage', '$username', '$feedback', '$rating')";

    // Execute the query
    $return_query = mysqli_query($conn, $feedback_query);

    // Check the result
    if ($return_query) {
        header("location: index.php");
        exit(); // Stop further execution
    } else {
        echo "Something Went Wrong";
    }
} else {
    echo "User not authenticated";
}
?>
