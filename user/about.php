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
    
  <!--about-->
    <div class="container" id="about">
    <hr><p>Welcome to our world of technology! At Tronic Spares by Orion, we are your one-stop destination for cutting-edge computing solutions. Whether you're in the market for a brand-new laptop, looking to upgrade your current device, or searching for the perfect laptop accessories, we've got you covered.</p>
    <p>Our extensive range of products includes a wide selection of brand-new laptops, each boasting the latest features and innovations to keep you ahead in the digital realm. We understand that quality matters, so we offer a curated collection of top-tier laptop brands known for their reliability and performance.</p>    
    <hr>
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-5 py-3 py-md-0">
                <div class="card">
                    <img src="./Project/Untitled-1.png" alt="">
                </div>
            </div>
            <div class="col-md-7 py-3 py-md-0">
                <p>But that's not all; we're also proud to offer reconditioned laptops that provide an affordable and eco-friendly alternative. Our expert technicians meticulously restore these laptops to like-new condition, ensuring they meet the highest standards of functionality and reliability. You can enjoy the benefits of premium technology without breaking the bank.</p>
                <p>In addition to laptops, we offer a comprehensive array of laptop accessories to enhance your computing experience. From ergonomic keyboards and precision mice to stylish laptop bags and durable protective cases, we have everything you need to customize and safeguard your device</p>
                <button id="btn">Read More...</button>
                <div id="div"></div>
              </div>
        </div>
    </div>
    <!--about-->

    <!-- offer -->
    <?php

    require_once("offer.php");
    ?>
    <!-- offer -->
    
    
    <!--newsletter-->
    <?php
      require_once("newsletter.php");
      ?>
    <!--newsletter-->

    <!-- footer -->
    <?php
      require_once("footer.php");
      ?>
    <!-- footer -->

    <a href="#" class="arrow"><i><img src="./images/arrow.png" alt=""></i></a>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
    $('#btn').click(function(){
      $.ajax('moreinfo.php',{
        success:function(result){
          $('#div').append(result);
          $('#btn').hide();
        }
      });
    });
    });
</script>
</body>
</html>