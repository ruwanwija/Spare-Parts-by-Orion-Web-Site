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

    <!--profile-->
    <?php
      
      $server = "localhost";
      $database = "tronic_spares_by_orion";
      $user = "root";
      $password = "";
      
      $conn = mysqli_connect($server, $user, $password, $database);
      
      if($conn){
              echo "";
              
      }
      else{
              echo "Something went wrong!!";
      }
      
      $current_user_id = $_SESSION["current_user_id"];
      $query_user = "SELECT * FROM user WHERE user_id = '$current_user_id'";
      $result_user = mysqli_query($conn,$query_user);
      $row = mysqli_fetch_assoc($result_user);
      ?>
    <div class="container" id="login">
    <div class="row">
        <div class="col-md-5 py-3 py-md-0" id="side1">
            <h3 class="text-center">Profile</h3>
        </div>
        <div class="col-md-7 py-3 py-md-0" id="side2">
            <h3 class="text-center">Your Profile</h3>
            <div class="input2 text-center">
                <div style="display:flex;align:right;padding:10px;">
                  <label>Name:<?php echo $row["user_name"]?></label><br>
                </div>
                <div style="display:flex;align:right;padding:10px;">
                  <label>Phone:<?php echo $row["user_contact_no"]?></label><br>
                </div>
                <div style="display:flex;align:right;padding:10px;">
                  <label>Address:<?php echo $row["user_address"]?></label><br>
                </div>
                <div style="display:flex;align:right;padding:10px;">
                  <label>Email:<?php echo $row["user_email"]?></label><br>
                </div>
                <div style="display:flex;align:right;padding:10px;">
                  <label>Password:<?php echo $row["user_password"]?></label><br>
                </div>
                <!-- <div class="text-center" style="padding-top:10px;">
                    <a href="update_profile.php" id="btnlogin">UPDATE</a>
                </div> -->
            </div>
        </div>
    </div>
   </div>
  <!--profile>

    <!-- footer -->
    <?php

    require_once("footer.php");
    ?>
    <!-- footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>