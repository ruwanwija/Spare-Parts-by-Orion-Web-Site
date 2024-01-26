<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronic Spares Orion</title>
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
  
    <!-- home content -->
    <?php
    require_once('home.php');
   ?>
    <!-- home content -->

    <!-- product cards -->
    <div class="container" id="product-cards">
      <h1 class="text-center">PRODUCTS</h1>
      <!--row start-->
      <div class="row" style="margin-top: 30px;">
      <!--column start-->
      <!-- fetching produc-->
      <?php 
      require_once("config.php");

  $select_query="SELECT * FROM products ORDER BY id ASC";
  $result_query = mysqli_query($conn, $select_query); 

  if (mysqli_num_rows($result_query) > 0) {
    while ($row = mysqli_fetch_array($result_query)) {

      echo "<div class='col-md-3 py-3 py-md-0'>
              <form method='post' action='product.php'>
                <input type='hidden' name='product_id' value='" . $row['id'] . "'>
                <div class='card'>
                <img src='../admin/product_images/" . $row['product_image'] . "' alt=''>
                  <div class='card-body'>
                    <h5 class='text-center'>" . $row["name"] . "</h5>
                    <input type='hidden' name='hidden_name' value='" . $row['name'] . "'>
                    <input type='hidden' name='hidden_price' value='" . $row['price'] . "'>";
                    if ($row['quantity'] <= 0) {
                      echo "<h2><h2>RS:" . $row['price'] . "/unit <span style='width:80px display: inline-block;'></span> <span>Out of Stock</span></h2>";
                    } else {
                      echo "<h2>RS:" . $row['price'] . "/unit <span style='width:80px display: inline-block;'></span> <span><input type='submit' name='add' id='btnlogin'' value='Add'></span></h2>";
                    }
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>                                 
                    </div>
                </div>
              </form>
            </div>";
    }
  }
?>

        <!--column end-->
      </div>
      <!--row end-->
    </div>
    <!-- product cards -->

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

    <a href="#" class="arrow"><i><img src="./images/arrow.png" alt=""></i></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
    document.getElementById('shopNowBtn').addEventListener('click', function() {
    document.getElementById('product-cards').scrollIntoView({ behavior: 'smooth' });
    });
    </script>
</body>
</html>