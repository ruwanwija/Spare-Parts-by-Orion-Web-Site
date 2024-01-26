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
    

     <!--delivery-->
     <form method="POST">
   <div class="container" id="login">
    <div class="row">
        <div class="col-md-5 py-3 py-md-0" id="side1">
            <h3 class="text-center">Delivery Details</h3>
        </div>
        <div class="col-md-7 py-3 py-md-0" id="side2">
            <h3 class="text-center">Delivery Details</h3>
            <div class="input2 text-center">
                <input type="text" id="order_id" name="order_id" placeholder="Order ID">
            </div>
            <div class="text-center" style="padding-top:10px;">
                <button type="submit" id="btnlogin">SEARCH</button>
            </div>

            <?php
    require_once("config.php");
    if(isset($_POST['order_id']))
{
    $filtervalue = $_POST['order_id'];
    $query = "SELECT * FROM delivery WHERE order_id = '$filtervalue'";
    $query_run = mysqli_query($conn,$query);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $items)
        {
?>
                <div class="input2 text-center">
                    <div style="display:flex;align:right;padding:10px;">
                        <label>Driver's Name: <?= $items['driver_name']; ?></label><br>
                    </div>
                    <div style="display:flex;align:right;padding:10px;">
                        <label>Contact No: <?= $items['driver_contact_no']; ?></label><br>
                    </div>
                    <div style="display:flex;align:right;padding:10px;">
                        <label>Vehicle No: <?= $items['driver_vehicle_no']; ?></label><br>
                    </div>
                    <div style="display:flex;align:right;padding:10px;">
                        <label>Customer Address: <?= $items['address']; ?></label><br>
                    </div>
                </div>
<?php
            }
        }
        else
        {
?>
            <div class="input2 text-center">
                <div style="display:flex;align:right;padding:10px;">
                    <label>Order ID does not exist</label><br>
                </div>
            </div>
<?php
        }
    }
?>

        </div>
    </div>
   </div>
</form>
<!--delivery-->

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