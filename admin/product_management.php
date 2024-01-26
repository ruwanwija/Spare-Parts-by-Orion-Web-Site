<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/product_management.css">
</head>
<body>
  <div> 
  <?php require_once("nav.php");?>
  </div>
</div>

<div class="container">
    <table>
        <tr>
            <th>Product ID</th>
            <th>category</th>
            <th>Product</th>
            <th>Item NO</th>
            <th>Quantity</th>
            <th>Image</th>
            <th>Description</th>
            <th class="datasheet">Datasheet</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php
        require_once("../config.php");
        $query = "SELECT * FROM products";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0) {
            foreach($query_run as $items) {
                ?>
        <tr>
            <td><?= $items['id']; ?></td>
            <td><?= $items['category']; ?></td>
            <td><?= $items['name']; ?></td>
            <td><?= $items['item_no']; ?></td>
            <td><?= $items['quantity']; ?></td>
            <td><img src="product_images/<?php echo $items['product_image'];?>" width= 200 title="<?php echo $items['product_image'];?>"  ></td>
            <td><?= $items['description']; ?></td>
            <td class="datasheet"><?= $items['datasheet']; ?></td>
            <td>Rs: <?= $items['price']; ?></td>
            <td>
                <form action="remove_product.php" method="post" class="button-form">
                    <input type="hidden" name="id" value="<?= $items['id']; ?>">
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
                <form action="update_product.php" method="post" class="button-form">
                    <input type="hidden" name="product_id" value="<?= $items['id']; ?>">
                    <button type="submit" name="update" class="btn btn-success">Update</button>
                </form>
            </td>
        </tr>
        <?php
            }
        } else {
            // Handle case where no products are found
        }
        ?>
    </table>
</div>


<script src="js/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>