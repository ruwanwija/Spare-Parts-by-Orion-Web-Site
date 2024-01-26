
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/insert_product.css">
</head>
<body>
  <div> 
  <?php require_once("nav.php");?>
    
  </div>
  <div class="container">
    <div class="text-center">
        <h2>Delivery</h2>
    </div>
    <form action="delivery_process.php" method="post">
    <div class="form-group">
            <div class="text-center">
                <input type="text" id="order_id" name="order_id" required placeholder="Enter Order ID" value="<?php echo $_POST['order_id']; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="text-center">
                <select id="driver_name" name="driver_name" required>
                    <option value="" disabled selected>Select driver</option>
                    <?php
                        require_once("../config.php");

                        // Assuming you have a database connection named $conn
                        $sql = "SELECT driver_id , name FROM driver";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                            }
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="text-center">
                <input type="text" id="contact_no" name="contact_no" required placeholder="Enter Driver Contact No">
            </div>
        </div>
        <div class="form-group">
            <div class="text-center">
                <input type="text" id="vehicle_no" name="vehicle_no" required placeholder="Enter Vehicle No">
            </div>
        </div>
        <div class="form-group">
            <div class="text-center">
                <textarea id="address" name="address" required placeholder="Enter Customer Address" rows="4" cols="37"><?php echo $_POST['customer_address']; ?></textarea>
            </div>
        </div>
        <div class="text-center">
          <button type="submit" name="submit" >Deliver</button>
        </div>  
    </form>
</div>
<?php
require_once("..//config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];

    // Assuming you have a table named 'status' with columns 'order_id' and 'status'
    $status = "Delivered";
    $sql = "INSERT INTO status (order_id, status) VALUES ('$order_id', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "Delivery status updated successfully";
    } else {
        echo "Error updating delivery status: " . $conn->error;
    }

    $conn->close();
}
?>

<script>
    document.getElementById('driver_name').addEventListener('change', function() {
    var selectedDriver = this.value;

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_driver_info.php?driver=' + selectedDriver, true);

    xhr.onload = function() {
        if (xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            document.getElementById('contact_no').value = data.contact_no;
            document.getElementById('vehicle_no').value = data.vehicle_no;
        }
    };

    xhr.send();
});

</script>
<script src="js/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>