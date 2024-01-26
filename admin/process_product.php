<?php
require_once("../config.php");

if(isset($_POST["submit"])){
    $product_category = mysqli_real_escape_string($conn, $_POST['category_name']);
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $item_no = mysqli_real_escape_string($conn, $_POST['item_no']);
    $product_quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $product_description = mysqli_real_escape_string($conn, $_POST['description']);
    $product_datasheet = mysqli_real_escape_string($conn, $_POST['datasheet']);
    $product_price = mysqli_real_escape_string($conn, $_POST['price']);

    if ($_FILES["image"]["error"] == 4) {
        echo "Image Does Not Exist";
    } else {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        if (!in_array($imageExtension, $validImageExtension)) {
            echo "Invalid Image Extension";
        } else {
            $newImageName = uniqid() . '.' . $imageExtension;
            $uploadPath = 'product_images/' . $newImageName;

            if(move_uploaded_file($tmpName, $uploadPath)) {
                $query = "INSERT INTO products (category, name, item_no, quantity, product_image, description, datasheet, price) 
                          VALUES ('$product_category', '$product_name', '$item_no', '$product_quantity', '$newImageName', '$product_description', '$product_datasheet', '$product_price')";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo "<script>alert('Successfully Added')</script>";
                    header("Location:insert_product.php");
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
}
?>
