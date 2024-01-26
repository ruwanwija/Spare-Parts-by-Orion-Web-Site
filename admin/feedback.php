<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/feedback.css">
</head>
<body>
  <div> 
  <?php require_once("nav.php");?>
  </div>
</div>

<div class="container">
    <table>
        <tr>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Customer Name</th>
            <th>Feedback</th>
            <th>Rating</th>
        </tr>
        <?php
        require_once("../config.php");
        $query = "SELECT * FROM feedback";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0) {
            foreach($query_run as $items) {
                ?>
        <tr>
            <td><?= $items['product_name']; ?></td>
            <td><img src="product_images/<?php echo $items['product_image']; ?>" width="200" title="<?php echo $items['product_image']; ?>"></td>
            <td><?= $items['user_name']; ?></td>
            <td><?= $items['feedback']; ?></td>
            <td><?= $items['rating']; ?></td>
        </tr>
        <?php
            }
        } else {
            // Handle case where no products are found
        }
        ?>
    </table>
</div>


<script src="js/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>