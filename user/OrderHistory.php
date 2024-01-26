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
    <?php
    require_once('top_nav.php');
   ?>
    <!-- top navbar -->

    <!-- navbar -->
    <?php
    require_once('nav.php');
   ?>
    <!-- navbar -->
    

    <!--order history table-->
    <div class="container" id="login">
    <table class="table">
        <tr>
            <th>Order ID</th>
            <th>Product</th>
            <th>Total</th>
            <th>Quantity</th>
            <th>Status</th>
        </tr>
        <?php
        require_once("config.php");

        $query = "SELECT orders.order_id, 
        GROUP_CONCAT(DISTINCT order_items.product_name) as product_names, 
        orders.total,GROUP_CONCAT(DISTINCT status.status) as statuses,GROUP_CONCAT(DISTINCT order_items.quantity) as quantities
        FROM orders
        INNER JOIN user ON orders.user_name = user.user_name
        INNER JOIN order_items ON orders.order_id = order_items.order_id
        INNER JOIN status ON orders.order_id = status.order_id
        WHERE user.user_name = '{$_SESSION['current_user_name']}'
        GROUP BY orders.order_id";


        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0) {
            foreach($query_run as $item) {
                ?>
                <tr>
                    <td style="color:white"><?= $item['order_id']; ?></td>
                    <td style="color:white"><?php
                    $product_names = explode(',', $item['product_names']);
                    foreach($product_names as $product_name) {
                        echo ':: ' . $product_name . '<br>';

                    }
                    ?></td>
                    <td style="color:white"><?= $item['total']; ?></td>
                    <td style="color:white"><?php
                    $product_quantities = explode(',', $item['quantities']);
                    foreach($product_quantities as $product_quantity) {
                        echo $product_quantity . '<br>';
                    }
                ?></td>
                    <td style="color:white"><?= $item['statuses']; ?></td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td style="color:white" colspan="6">No records found</td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
    <!--order history table-->

    <!-- offer -->
    <?php

    require_once("offer.php");
    ?>
    <!-- offer -->

    <!-- newslater -->
    <?php
      require_once("newsletter.php");
      ?>
    <!-- newslater -->

    <!-- footer -->
    <?php
      require_once("footer.php");
      ?>
    <!-- footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>