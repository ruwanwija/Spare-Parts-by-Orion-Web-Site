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
    
<!--update profile-->
  <form action="profile_update_process.php" method="POST">
   <div class="container" id="login">
    <div class="row">
        <div class="col-md-5 py-3 py-md-0" id="side1">
            <h3 class="text-center">Update Profile</h3>
        </div>
        <div class="col-md-7 py-3 py-md-0" id="side2">
            <h3 class="text-center">Update Profile</h3>
            <div class="input2 text-center">
            <input type="text" id="name" name="name" placeholder="Name"><br>
            <input type="number" id="Phone" name="Phone" placeholder="Phone"><br>
            <input type="text" id="address" name="address" placeholder="Address"><br>
            <input type="email" id="Email" name="Email" placeholder="Email"><br>
            <input type="password" id="Password" name="Password" placeholder="Password"><br>
            </div>
            <p class="text-center"><button id="btnlogin">UPDATE</button></p>
        </div>

    </div>
   </div>
</form>
<!--update profile-->

    <!-- footer -->
    <?php
    require_once('footer.php');
   ?>
    <!-- footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>