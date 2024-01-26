<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronic Spares Orion</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
</head>
<body>
<?php
require_once("..//config.php");

if(isset($_GET['name'])){
    $category_name = $_GET['name'];
    $result = $conn->query("SELECT * FROM categories WHERE name = '$category_name'");

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        require_once('top_nav.php');
        require_once('nav.php');
        require_once('home.php');
?>

        <div class="container" id="product-cards">
            <h1 class="text-center"><?php echo $category_name; ?></h1>
            <div class="row" style="margin-top: 30px;">
                <?php 
               $server = "localhost";
               $database = "tronic_spares_by_orion";
               $user = "root";
               $password = "";
               
               $conn = mysqli_connect($server, $user, $password, $database);
                $select_query = "SELECT * FROM categories 
                INNER JOIN products ON categories.name = products.category 
                WHERE categories.name = '$category_name' 
                ORDER BY products.id ASC";

                $result_query = mysqli_query($conn, $select_query);

                if ($result_query && mysqli_num_rows($result_query) > 0) {
                    while ($row = mysqli_fetch_array($result_query)) {
                ?>
                        <div class='col-md-3 py-3 py-md-0'>
                            <form method='post' action='product.php'>
                                <input type='hidden' name='product_id' value='<?php echo $row['id']; ?>'>
                                <div class='card'>
                                    <img src='../admin/product_images/<?php echo $row['product_image']; ?>' alt=''>
                                    <div class='card-body'>
                                        <h5 class='text-center'><?php echo $row["name"]; ?></h5>
                                        <input type='hidden' name='hidden_name' value='<?php echo $row['name']; ?>'>
                                        <input type='hidden' name='hidden_price' value='<?php echo $row['price']; ?>'>
                                        <p class='text-center'><?php echo $row["description"] ?? "No description available"; ?></p>
                                        <?php
                                        if ($row["quantity"] <= 0) {
                                        echo "<h2><h2>RS:" . $row['price'] . "/unit <span style='width:80px display: inline-block;'></span> <span>Out of Stock</span></h2>";
                                        } else {
                                        echo "<h2>RS:" . $row['price'] . "/unit <span style='width:80px display: inline-block;'></span> <span><input type='submit' name='add' id='btnlogin'' value='Add'></span></h2>";
                                        }
                                        ?>
                                        <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>                                 
                                    </div>
                                </div>
                            </form>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>

<?php
        require_once("offer.php");
        require_once("newsletter.php");
        require_once("footer.php");
    } else {
        $category_name = "Category Not Found";
        $category_description = "This category does not exist.";
    }
} else {
    $category_name = "Category Not Found";
    $category_description = "No category provided.";
}
?>

<a href="#" class="arrow"><i><img src="./images/arrow.png" alt=""></i></a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    document.getElementById('shopNowBtn').addEventListener('click', function() {
    document.getElementById('product-cards').scrollIntoView({ behavior: 'smooth' });
    });
    </script>
</body>
</html>
