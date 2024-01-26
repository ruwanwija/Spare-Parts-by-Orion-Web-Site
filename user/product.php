<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronic Shop</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap links -->
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <!-- fonts links -->
</head>
<body>

    <!-- top navbar -->
    <?php require_once("top_nav.php"); ?>
    <!-- top navbar -->

    <!-- navbar -->
    <?php require_once("nav.php"); ?>
    <!-- navbar -->
    

    <!-- product details -->
    <div class="container" id="product-cards">
    <h1 class="text-center"><span style="border: 10px;">PRODUCT</span> <span style="border: 10px;">DETAILS </span></h1>
    <?php
    require_once("config.php");

    if(isset($_POST["id"])){
        $id = $_POST["id"];
        // Retrieve additional details from the database based on the $id
        $query = "SELECT * FROM products WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        // Display the details
        if($row){
            echo "<div class='container'>
                     <div class='product-image'>
                        <img src='../admin/product_images/{$row['product_image']}' alt='{$row['name']}'>
                     </div>
                     <div class='product-details'>
                        <div>
                            <h5>Price: {$row['price']}</h5>
                        </div>
                        <div>
                            <h5>Description: {$row['description']}</h5>
                        <div>
                        <div>
                            <h5>Item No: {$row['item_no']}</h6>
                        </div> 
                        <div>
                            <h5>Datasheet: {$row['datasheet']}</h5>
                        </div>
                        <br>
                        <div class='form-container'>
                        <div class='inline-form'>
                            <h5>Product Quantity</h5>
                        </div>   
                        <form method='post' action='wishlist.php?action=add&id={$row['id']}' class='inline-form'>
                            <input type='number' min='1' max='{$row['quantity']}' name='quantity' class='form-control' value='1' style='width:100px; margin-right: 10px;'>
                            <input type='hidden' name='hidden_wishlist_name' value='{$row['name']}'> 
                            <input type='hidden' name='hidden_wishlist_price' value='{$row['price']}'>
                            <input type='hidden' name='hidden_wishlist_image' value='{$row['product_image']}'>
                            <input type='submit' name='wishlist' style='margin-top:5px;' id='btnlogin' value='Wishlist'>
                        </form>
                        
                        <form method='post' action='cart.php?action=add&id={$row['id']}' class='inline-form'>   
                            <input type='number' min='1' name='quantity' class='form-control' value='1' max='{$row['quantity']}'style='width:100px; margin-right: 10px;'>
                            <input type='hidden' name='hidden_cart_name' value='{$row['name']}'>
                            <input type='hidden' name='hidden_cart_price' value='{$row['price']}'>
                            <input type='hidden' name='hidden_cart_image' value='{$row['product_image']}'>
                            <input type='submit' name='cart' style='margin-top:5px;' id='btnlogin' value='Cart'>
                        </form>";
                        if(isset($_POST['quantity']) && $_POST['quantity'] > $row['quantity']) {
                            echo "<p style='color: red;'>You cannot buy this quantity.</p>";
                        }
                        echo"<form method='post' action='feedback.php?action=add&id={$row['id']}' class='inline-form'>
                            <input type='hidden' name='hidden_feedback_name' value='{$row['name']}'>
                            <input type='hidden' name='hidden_feedback_image' value='{$row['product_image']}'>
                            <input type='submit' name='feedback' style='margin-top:5px;' id='btnlogin' value='Feedback'>
                        </form>";
                        echo "</div>
                             </div>";
        } else {
            echo "Product not found.";
        }
    } else {
        echo "";
    }
    ?>
</div>


    <!-- product details -->
    
    <!-- offer -->
    <?php require_once("offer.php"); ?>
    <!-- offer -->
    
    <!-- newslater -->
    <?php require_once("newsletter.php"); ?>
    <!-- newslater -->

    <!-- footer -->
    <?php require_once("footer.php"); ?>
    <!-- footer -->

    <a href="#" class="arrow"><i><img src="images/arrow.png" alt=""></i></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>