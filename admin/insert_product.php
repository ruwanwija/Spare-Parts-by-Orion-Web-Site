
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
        <h2>Insert Product</h2>
    </div>
    <form action="process_product.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <div class="text-center">
            <select id="category_name" name="category_name" required>
                <option value="" disabled selected>Select category</option>
                <?php
						require_once("../config.php");

						// Assuming you have a database connection named $conn
						$sql = "SELECT id, name FROM categories";
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
                <input type="text" id="product_name" name="product_name" required placeholder="Enter Product">
            </div>
        </div>
        <div class="form-group">
            <div class="text-center">
                <input type="text" id="item_no" name="item_no" required placeholder="Enter Item No">
            </div>
        </div>
        <div class="form-group">
            <div class="text-center">
                <input type="number" id="quantity" min="1" name="quantity" required placeholder="Enter Quantity">
            </div>
        </div>
        <div class="form-group">
            <div class="text-center">
                <input type="file" name="image" id="image" accept=".jpg,.jpeg, .png" value="">
            </div>
        </div>
        <div class="form-group">
            <div class="text-center">
                <textarea id="description" name="description" required placeholder="Enter Description" rows="4" cols="37"></textarea>
            </div>
        </div>        <div class="form-group">
            <div class="text-center">
                <input type="text" id="datasheet" name="datasheet" required placeholder="Enter Datasheet Link">
            </div>
        </div>
        <div class="form-group">
            <div class="text-center">
                <input type="number" id="price" name="price" min="0" required placeholder="Enter Price(Rs:)">
            </div>
        </div>
        <div class="text-center">
          <button type="submit" name="submit" >Add Product</button>
        </div>  
    </form>
  </div>

<script src="js/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>