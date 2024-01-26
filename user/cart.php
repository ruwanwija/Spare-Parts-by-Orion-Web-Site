<?php
require_once("config.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['current_user_name'])){
    header("Location:login.php");
    exit();
}
?>
<?php
require_once("config.php");
if(isset($_POST['cart'])) {
  if(isset($_SESSION["cart"])){
    $item_array_id = array_column($_SESSION["cart"],"id");
    if(!in_array($_GET["id"],$item_array_id)){
      $item_array = array(
          'id' => $_GET["id"],
          'name' => $_POST["hidden_cart_name"],
          'price' => $_POST['hidden_cart_price'],
          'quantity' => $_POST['quantity'],
          'image' => $_POST['hidden_cart_image']
      );
      $_SESSION["cart"][] = $item_array;
      echo '<script>window.location="cart.php"</script>';
  } else {
      echo '<script>alert("Product is already added to cart")</script>';
      echo '<script>window.location="cart.php"</script>';
  }
} else {
  $item_array = array(
      'id' => $_GET["id"],
      'name' => $_POST["hidden_cart_name"],
      'price' => $_POST['hidden_cart_price'],
      'quantity' => $_POST['quantity'],
      'image' => $_POST['hidden_cart_image']
  );

  $_SESSION["cart"][0] = $item_array;
}
}
if(isset($_GET["action"])){
    if($_GET["action"] == "delete"){
        foreach($_SESSION["cart"] as $keys => $value){
            if($value["id"] == $_GET["id"]){
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Product has been removed")</script>';
                header("Location: cart.php");
                exit(); // Added to stop script execution after redirect
            }
        }
    }
}
if(!isset($_SESSION["cart"]) || empty($_SESSION["cart"])) {
    header("Location: index.php");
    exit();
}

?>
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
    <div class="top-navbar">
        <p>WELCOME TO OUR SHOP</p>
        <div class="icons">
            
            
        <?php
          if(isset($_SESSION['current_user_name'])){
              echo '
              <span>Welcome '.$_SESSION['current_user_name'].'</span>
              <a href="bot.php"><img src="./images/bot.png" alt="" width=60px"></a>
              <a href="logout.php"><img src="./images/register.png" alt="" width="18px">Logout</a>
              <a href="profile.php"><img src="./images/register.png" alt="" width="18px">Profile</a>
              <a href="Delivery.php"><img src="./images/register.png" alt="" width="18px">Delivery</a>
              <a href="OrderHistory.php"><img src="./images/register.png" alt="" width="18px">Order History</a>
              ';
          } else {
              echo '
              <a href="bot.php"><img src="./images/bot.png" alt="" width=60px"></a>
              <a href="login.php"><img src="./images/register.png" alt="" width="18px">Login</a>
              <a href="register.php"><img src="./images/register.png" alt="" width="18px">Register</a>
              ';
          }
          ?>

        </div>
    </div>
    <!-- top navbar -->

    <!-- navbar -->
    <?php
    require_once('nav.php');
   ?>
    <!-- navbar -->
    

    <!--cart item-->
    <div class="container" id="product-cards">
    <h1 class="text-center">CART</h1>
    <div class="small-container cart-page">
        <form action="process_order.php" method="post">
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th> 
                        <th>Subtotal</th>
                    </tr>
                    <?php 
                    $total = 0;
                    foreach($_SESSION["cart"] as $value){
                        ?>
                        <tr>
                            <td>
                                <div class="cart-info">
                                <img src='../admin/product_images/<?php echo $value["image"]; ?>' alt='<?php echo $value["name"]; ?>'>
                                    <div>
                                        <p><?php echo $value["name"]; ?></p>
                                        <small>Rs:.<?php echo $value["price"]; ?></small>
                                        <a href="cart.php?action=delete&id=<?php echo $value['id']; ?>"><span class="text-danger">Remove</span></a>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo $value["quantity"]; ?></td>
                            <td>
                                <?php 
                                if (is_numeric($value['quantity']) && is_numeric($value['price'])) {
                                    $subtotal = $value['quantity'] * $value['price'];
                                    echo number_format($subtotal); 
                                    $total += $subtotal;
                                } else {
                                    echo "Invalid input";
                                }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <div class="total-price">
                    <table>
                        <tr>
                            <td>Total Price</td>
                            <td><?php echo number_format($total, 2); ?></td>
                        </tr>
                        <tr>
                            <td><button type="submit"  id='btnlogin' name="buy">BUY</button></td>
                        </tr>
            </table>
        </form>
        </div>
    </div>   
</div>
    <!--cart item-->

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