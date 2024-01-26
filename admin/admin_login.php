
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/admin_login.css">
</head>
<body>
<nav class="navbar">
  <div class="flex-container"> 
    <img src="CSS/img/logo.jpg" alt="Logo" class="logo">
  </div>
</nav>
  <div class="container">
  <h2>Admin Login</h2>
    <form action="admin_validator.php" method="post">
        <div class="form-group">
            <div class="text-center">
                <input type="text" id="admin_name" name="admin_name" placeholder="Admin Username"required>
            </div>
        </div>
        <div class="form-group">
            <div class="text-center">
                <input type="password" id="admin_password" name="admin_password" placeholder="Admin Password"required>
            </div>
        </div>
        <div class="text-center">
          <button type="submit" name="submit" >Login</button>
        </div>  
    </form>
  </div>

<script src="js/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>