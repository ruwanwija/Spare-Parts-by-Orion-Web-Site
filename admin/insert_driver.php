
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/insert_category.css">
</head>
<body>
  <div> 
  <?php require_once("nav.php");?>
    
  </div>
  <div class="container">
    <div class="text-center">
        <h2>Insert Driver</h2>
    </div>
    <form action="driver_adder.php" method="post">
        <div class="form-group">
            <div class="text-center">
                <input type="text" id="name" name="name" required placeholder="Enter Driver Name">
            </div>
        </div>
        <div class="form-group">
            <div class="text-center">
                <input type="number" id="contact_no" name="contact_no" required placeholder="Enter Driver Contact No">
            </div>
        </div>
        <div class="form-group">
            <div class="text-center">
                <input type="text" id="vehicle_no" name="vehicle_no" required placeholder="Enter Driver Vehicle No">
            </div>
        </div>
        <div class="form-group">
            <div class="text-center">
                <input type="text" id="license_no" name="license_no" required placeholder="Enter Driver Lisense No">
            </div>
        </div>
        <div class="text-center">
          <button type="submit" name="submit" >Add Driver</button>
        </div>  
    </form>
  </div>

<script src="js/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>