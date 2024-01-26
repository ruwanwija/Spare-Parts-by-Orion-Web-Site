<div class="top-navbar">
        <p>WELCOME TO OUR SHOP</p>
        <div class="icons">
            
            
        <?php
          session_start();
          if(isset($_SESSION['current_user_name'])){
              echo '
              <span>Welcome '.$_SESSION['current_user_name'].'</span>
              <a href="bot.php"><img src="./images/bot.png" alt="" width=60px"></a>
              <a href="logout.php"><img src="./images/register.png" alt="" width="18px">Logout</a>
              <a href="profile.php"><img src="./images/register.png" alt="" width="18px">Profile</a>
              <a href="Delivery.php"><img src="./images/register.png" alt="" width="18px">Delivery</a>
              <a href="OrderHistory.php"><img src="./images/register.png" alt="" width="18px">Order History</a>
              ';
          } else {
              echo '
              <a href="bot.php"><img src="./images/bot.png" alt="" width=60px"></a>
              <a href="login.php"><img src="./images/register.png" alt="" width="18px">Login</a>
              <a href="register.php"><img src="./images/register.png" alt="" width="18px">Register</a>
              
              ';
          }
          ?>

        </div>
    </div>