<?php

require_once("../config.php");

if(isset($_POST['name']) && isset($_POST['description'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];

    $category_adder_query = "INSERT INTO categories (name, description) VALUES ('$name', '$description')";

    $return_query = mysqli_query($conn, $category_adder_query);

    if($return_query){
        echo "<script>alert('Done')</script>";
        header("Location:insert_category.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }

} else {
    echo "Invalid input data.";
}

mysqli_close($conn);

?>
