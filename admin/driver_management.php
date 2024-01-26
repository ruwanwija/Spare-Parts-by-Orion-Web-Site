<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/category_management.css">
</head>
<body>
  <div> 
  <?php require_once("nav.php");?>
  </div>
</div>

<div class="container">
    <table>
        <tr>
            <th>Driver ID</th>
            <th>Name</th>
            <th>Contact No</th>
            <th>Vehicle No</th>
            <th>License No</th>
            <th>Action</th>
        </tr>
        <?php
        require_once("../config.php");
        $query = "SELECT * FROM driver";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0) {
            foreach($query_run as $items) {
                ?>
        <tr>
            <td><?= $items['driver_id']; ?></td>
            <td><?= $items['name']; ?></td>
            <td><?= $items['contact_no']; ?></td>
            <td><?= $items['vehicle_no']; ?></td>
            <td><?= $items['license_no']; ?></td>
            <td>
                <form action="remove_driver.php" method="post">
                   <input type="hidden" name="id" value="<?= $items['driver_id']; ?>">
                   <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </td>
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