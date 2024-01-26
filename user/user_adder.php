<?php

require_once("../config.php");

$user_name = $_POST['name'];
$user_contact_no = $_POST['Phone'];
$user_address = $_POST['address'];
$user_email = $_POST['Email'];
$user_password = $_POST['Password'];

$user_adder_query = "INSERT INTO user(user_id,user_name,user_contact_no,user_address,user_email,user_password)VALUES('','$user_name','$user_contact_no','$user_address','$user_email','$user_password')";

$return_query = mysqli_query($conn, $user_adder_query);

if($return_query){
    echo "Done";
    header("location:index.php");
}
else{
    echo "Somthing Went Wrong";
}

?>