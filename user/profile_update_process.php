<?php
require_once("config.php");

// Retrieve form data
$name = $_POST['name'];
$phone = $_POST['Phone'];
$address = $_POST['address'];
$email = $_POST['Email'];
$password = $_POST['Password'];

// Assuming you have a unique identifier for your users, let's say 'id'
$id = 5; // Change this to the appropriate user ID

$sql = "UPDATE user SET user_name='$name', user_contact_no='$phone', user_address='$address', user_email='$email', user_password='$password' WHERE user_id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
