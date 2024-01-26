<nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html" id="logo"><span id="span1">Tronic</span>spares <span>Orion</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><img src="./images/menu.png" alt="" width="30px"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Cart.php">Cart</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Wishlist.php">Wishlist</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Category
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: rgb(67 0 86);">
                <?php
                          require_once("..//config.php");

                          $result = $conn->query("SELECT * FROM categories");

                          $categories = [];
                          if ($result->num_rows > 0) {
                              while($row = $result->fetch_assoc()) {
                                  $categories[] = $row;
                              }
                          }

                          $conn->close();
                          ?>

                            <?php foreach ($categories as $category): ?>
                                    <li><a class="dropdown-item" href="category.php?name=<?php echo $category['name']; ?>"><?php echo $category["name"]; ?></a></li>
                                <?php endforeach; ?>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>