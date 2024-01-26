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
if(isset($_POST['wishlist'])) {
  if(isset($_SESSION["wishlist"])){
    $item_array_id = array_column($_SESSION["wishlist"],"id");
    if(!in_array($_GET["id"],$item_array_id)){
      $item_array = array(
          'id' => $_GET["id"],
          'name' => $_POST["hidden_wishlist_name"],
          'price' => $_POST['hidden_wishlist_price'],
          'quantity' => $_POST['quantity'],
          'image' => $_POST['hidden_wishlist_image']
      );
      $_SESSION["wishlist"][] = $item_array;
      echo '<script>window.location="wishlist.php"</script>';
  } else {
      echo '<script>alert("Product is already added to wishlist")</script>';
      echo '<script>window.location="wishlist.php"</script>';
  }
} else {
  $item_array = array(
      'id' => $_GET["id"],
      'name' => $_POST["hidden_wishlist_name"],
      'price' => $_POST['hidden_wishlist_price'],
      'quantity' => $_POST['quantity'],
      'image' => $_POST['hidden_wishlist_image']
  );

  $_SESSION["wishlist"][0] = $item_array;
}
}
if(isset($_GET["action"])){
    if($_GET["action"] == "delete"){
        foreach($_SESSION["wishlist"] as $keys => $value){
            if($value["id"] == $_GET["id"]){
                unset($_SESSION["wishlist"][$keys]);
                echo '<script>alert("Product has been removed")</script>';
                header("Location: wishlist.php");
                exit(); // Added to stop script execution after redirect
            }
        }
    }
}
if(!isset($_SESSION["wishlist"]) || empty($_SESSION["wishlist"])) {
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
              <a href="logout.php"><img src="./images/register.png" alt="" width="18px">Logout</a>
              <a href="profile.php"><img src="./images/register.png" alt="" width="18px">Profile</a>
              <a href="Delivery.php"><img src="./images/register.png" alt="" width="18px">Delivery</a>
              <a href="OrderHistory.php"><img src="./images/register.png" alt="" width="18px">Order History</a>
              ';
          } else {
              echo '
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
    

    <!--wishlist item-->
    <div class="container" id="product-cards">
    <h1 class="text-center">WISHLIST</h1>
    <div class="small-container cart-page">
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th> 
                        <th>Subtotal</th>
                    </tr>
                    <?php 
                    $total = 0;
                    foreach($_SESSION["wishlist"] as $value){
                        ?>
                        <tr>
                            <td>
                                <div class="cart-info">
                                <img src='../admin/product_images/<?php echo $value["image"]; ?>' alt='<?php echo $value["name"]; ?>'>
                                    <div>
                                        <p><?php echo $value["name"]; ?></p>
                                        <small>Rs:.<?php echo $value["price"]; ?></small>
                                        <a href="wishlist.php?action=delete&id=<?php echo $value['id']; ?>"><span class="text-danger">Remove</span></a>
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
                        <td>
                            <form action="cart.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                                <input type="hidden" name="hidden_cart_name" value="<?php echo $value['name']; ?>">
                                <input type="hidden" name="hidden_cart_price" value="<?php echo $value['price']; ?>">
                                <input type="hidden" name="quantity" value="<?php echo $value['quantity']; ?>">
                                <input type="hidden" name="hidden_cart_image" value="<?php echo $value['image']; ?>">
                                <button type="submit" id="btnlogin" name="cart">Add to Cart</button>
                                <?php unset($_SESSION["wishlist"]);?>
                            </form>
                        </td>
                        </tr>
            </table>
        </div>
    </div>   
</div>
    <!--wishlist item-->

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