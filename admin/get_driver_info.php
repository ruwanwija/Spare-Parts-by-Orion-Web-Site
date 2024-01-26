<?php
require_once("../config.php");

if(isset($_GET['driver'])) {
    $driver_name = $_GET['driver'];

    $stmt = $conn->prepare("SELECT contact_no, vehicle_no FROM driver WHERE name = ?");
    $stmt->bind_param("s", $driver_name);
    $stmt->execute();
    $stmt->bind_result($contact_no, $vehicle_no);

    if($stmt->fetch()) {
        $response = array(
            'contact_no' => $contact_no,
            'vehicle_no' => $vehicle_no
        );
        echo json_encode($response);
    } else {
        echo json_encode(array('error' => 'Driver not found'));
    }

    $stmt->close();
    $conn->close();
}
?>
