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
    <?php require_once("nav.php"); ?>
    <!-- navbar -->
    

    <!-- feedback -->
    <div class="container3">
    <h2 style="display: flex; justify-content: center; align-items: center;">Feedback Form</h2>
        <form action="feedback_process.php" method="post">
        <div class="form-group1">
            <div class="name">
                <label for="name">Product Name:</label>
                <!-- Display product name from hidden input -->
                <input type="text" id="feedback_name" name="feedback_product_name" value="<?php echo $_POST['hidden_feedback_name'] ?? ''; ?>" required>
            </div>
        </div>
        <div class="form-group1">
            <div class="email">
                <label for="email">Product Image:</label>
                <!-- Display product image from hidden input -->
                <img src='../admin/product_images/<?php echo $_POST["hidden_feedback_image"]; ?>' alt="Product Image" style="width: 300px; height: 200px;">

                <input type="hidden" id="feedback_image" name="feedback_image" value="<?php echo $_POST['hidden_feedback_image'] ?? ''; ?>">
            </div>
        </div>

            <div class="form-group1">
                <label for="feedback">Feedback:</label>
                <textarea id="feedback" name="feedback" required></textarea>
            </div>

            <div class="form-group1">
                <label for="rating">Rating:</label>
                <div class="star-rating">
                    <input type="radio" name="rating" value="1" id="1stars">
                    <label for="1stars"></label>
                    <input type="radio" name="rating" value="2" id="2stars">
                    <label for="2stars"></label>
                    <input type="radio" name="rating" value="3" id="3stars">
                    <label for="3stars"></label>
                    <input type="radio" name="rating" value="4" id="4stars">
                    <label for="4stars"></label>
                    <input type="radio" name="rating" value="5" id="5star">
                    <label for="5star"></label>
                </div>
            </div>
            <input style="display: flex; justify-content: center; align-items: center;" type="submit" id='btnlogin' value="Submit Feedback">
        </form>
    </div>


    <!-- feedback -->
    
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
