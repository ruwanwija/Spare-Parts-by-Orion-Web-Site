<?php

require_once("../config.php");

if(isset($_POST['name']) && isset($_POST['contact_no']) && isset($_POST['vehicle_no']) && isset($_POST['license_no'])) {

    $name = $_POST['name'];
    $contact_no = $_POST['contact_no'];
    $vehicle_no = $_POST['vehicle_no'];
    $license_no = $_POST['license_no'];

    $driver_adder_query = "INSERT INTO driver (name, contact_no, vehicle_no, license_no) VALUES ('$name', '$contact_no', '$vehicle_no', '$license_no')";
    $return_query = mysqli_query($conn, $driver_adder_query);

    if($return_query){
        echo "<script>alert('Done')</script>";
        header("Location:insert_driver.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }

} else {
    echo "Invalid input data.";
}

mysqli_close($conn);

?>
