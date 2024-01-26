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
            <th>Name</th>
            <th>Contact No</th>
            <th>Address</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        require_once("../config.php");
        $query = "SELECT * FROM user";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0) {
            foreach($query_run as $items) {
                ?>
        <tr>
            <td><?= $items['user_name']; ?></td>
            <td><?= $items['user_contact_no']; ?></td>
            <td><?= $items['user_address']; ?></td>
            <td><?= $items['user_email']; ?></td>
            <td>
                <form action="remove_user.php" method="post">
                   <input type="hidden" name="id" value="<?= $items['user_id']; ?>">
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