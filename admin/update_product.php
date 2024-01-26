<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/update_product.css">
</head>
<body>
  <div> 
  <?php require_once("nav.php");?>
  </div>
</div>

<div class="container">
        <h2>Update Product</h2>
        <?php
            require_once("../config.php");

            if(isset($_POST['update'])) {
                $product_id = $_POST['product_id'];
                $query = "SELECT * FROM products WHERE id='$product_id'";
                $query_run = mysqli_query($conn, $query);

                if(mysqli_num_rows($query_run) > 0) {
                    $product = mysqli_fetch_assoc($query_run);
                    ?>
                    <form action="process_update_product.php" method="post">
                        <input type="hidden" name="id" value="<?= $product['id']; ?>">
                        <div class="form-group">
                            <label>Product Category: <?= $product['category']; ?></label><br>
                            <label>Product Name: <?= $product['name']; ?></label><br>
                            <label>Product Item No: <?= $product['item_no']; ?></label><br>
                            <label>Product Image:</label>
                            <img src="product_images/<?php echo $product['product_image'];?>" width="150" title="<?php echo $product['product_image'];?>"><br>
                            <label>Product Discription: <?= $product['description']; ?></label><br>
                            <label>Product Datasheet: <?= $product['datasheet']; ?></label><br>
                            <div class="form-group" style="display: flex; align-items: center;">
                            <label for="quantity">Product Quantity:</label>
                            <input type="text" style="width:100px;" class="form-control" id="quantity" name="quantity" value="<?= $product['quantity']; ?>">
                            <label for="price" style="margin-left: 20px;">Product Price(Rs:):</label>
                            <input type="text" style="width:100px;" class="form-control" id="price" name="price" value="<?= $product['price']; ?>">
                        </div>

                        </div>
                        <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                    </form>

                    <?php
                } else {
                    echo "Product not found.";
                }
            } else {
                echo "Invalid request.";
            }
        ?>
    </div>


<script src="js/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>