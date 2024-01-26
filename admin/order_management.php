<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/order_management.css">
</head>
<body>
  <div> 
  <?php require_once("nav.php");?>
  </div>
</div>

<div class="container">
    <table>
        <tr>
            <th>Order ID</th>
            <th>Customer Name</th>
            <th>Customer Contact No</th>
            <th>Products</th>
            <th>Quantity</th>
            <th>Total</th>   
            <th>Amount</th>
            <th>Action</th>
            <th>Status</th>
        </tr>
        <?php
            require_once("..//config.php");
            $query = "SELECT 
                        orders.order_id, 
                        orders.user_name, 
                        orders.total, 
                        GROUP_CONCAT(order_items.product_name) as product_names, 
                        GROUP_CONCAT(order_items.quantity) as product_quantity,  
                        GROUP_CONCAT(order_items.subtotal) as total_subtotal, 
                        user.user_name, 
                        user.user_contact_no, 
                        user.user_address 
                    FROM orders 
                    INNER JOIN order_items ON orders.order_id = order_items.order_id 
                    INNER JOIN user ON orders.user_name = user.user_name 
                    GROUP BY orders.order_id";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run) > 0) {
                foreach($query_run as $item) {
        ?>
        <tr>
            <td><?= $item['order_id']; ?></td>
            <td><?= $item['user_name']; ?></td>
            <td><?= $item['user_contact_no']; ?></td>
            <td>
                <?php
                    $product_names = explode(',', $item['product_names']);
                    foreach($product_names as $product_name) {
                        echo ':: ' . $product_name . '<br>';

                    }
                ?>
            </td>
            <td>
                <?php
                    $product_quantities = explode(',', $item['product_quantity']);
                    foreach($product_quantities as $quantity) {
                        echo $quantity . '<br>';
                    }
                ?>
            </td>
            <td>
                <?php
                    $total_subtotal = explode(',', $item['total_subtotal']);
                    foreach($total_subtotal as $subtotal) {
                        echo $subtotal . '<br>';
                    }
                ?>
            </td>   
            <td><?= $item['total']; ?></td>
            <td>
                <form action="remove_order.php" method="post">
                    <input type="hidden" name="order_id" value="<?= $item['order_id']; ?>">
                    <button type="submit" class="btn btn-danger" style="margin-bottom:10px;">Remove</button>
                </form>
                <form action="invoice.php" method="post">
                        <input type="hidden" name="order_id" value="<?= $item['order_id']; ?>">
                        <input type="hidden" name="product_names" value="<?= $item['product_names']; ?>">
                        <input type="hidden" name="product_quantity" value="<?= $item['product_quantity']; ?>">
                        <input type="hidden" name="total_subtotal" value="<?= $item['total_subtotal']; ?>">
                        <input type="hidden" name="total" value="<?= $item['total']; ?>">
                        <button type="submit" class="btn btn-primary">Invoice</button>
                    </form>
            </td>
            <td>
                <form action="status.php" method="post">
                    <input type="hidden" name="order_id" value="<?= $item['order_id']; ?>">
                    <input type="hidden" name="status" value="Processing">
                    <button type="submit" class="btn btn-success" name="update_status" style="margin-bottom:10px;">Processing</button>
                </form>
                <form action="deliver.php" method="post">
                    <input type="hidden" name="order_id" value="<?= $item['order_id']; ?>">
                    <input type="hidden" name="customer_address" value="<?= $item['user_address']; ?>">
                    <button type="submit" class="btn btn-success">Deliver</button>
                </form>
            </td>
        </tr>
        <?php
                }
            } else {
        ?>
        <tr>
            <td colspan="7">No records found</td>
        </tr>
        <?php
            }
        ?>
    </table>
</div>

<script>
function setOrderDetails(orderId, customerAddress) {
    document.getElementById('order_id').value = orderId;
    document.getElementById('address').value = customerAddress;
    document.getElementById('product_name').value = orderId;
}
</script>
<script src="js/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>