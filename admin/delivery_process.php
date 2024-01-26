<?php
require_once("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];
    $customer_address = $_POST['address'];
    $driver_name = $_POST['driver_name']; 
    $driver_contact_no = $_POST['contact_no']; 
    $vehicle_no = $_POST['vehicle_no']; 

    $sql = "INSERT INTO delivery (delivery_id ,order_id, driver_name, driver_contact_no, driver_vehicle_no, address)
            VALUES ('.','$order_id', '$driver_name', '$driver_contact_no', '$vehicle_no', '$customer_address')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully";
        header("Location:order_management.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
