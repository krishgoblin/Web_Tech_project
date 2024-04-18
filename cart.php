<?php
session_start();
include 'connect.php';

// if(isset($_SESSION['email'])) {
//   $user_id = $_SESSION['email'];
//   $query = "SELECT products.*, cart.quantity FROM products JOIN cart ON products.product_id = cart.product_id WHERE cart.user_id = $user_id";
//   $result = mysqli_query($connection, $query);
// }

// Display cart contents in a table
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NKJewels</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="style.css" />
    <script src="validation.js"></script>
    <style>
        body {
  font-family: Arial, sans-serif;
}

h1 {
  text-align: center;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

thead {
  background-color: #f2f2f2;
}

th, td {
  padding: 12px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
}

tbody tr:hover {
  background-color: #f5f5f5;
}
    
    </style>
  </head>

  <body>
    <header>
      <div class="navbar">
        <div class="nav-logo border">
        <a href="./homepage.php">
          <div class="logo"></div>
          </a>
        </div>

        <div class="nav-address border">
          <p class="add-first">Deliver to</p>
          <div class="add-icon">
            <i class="fa fa-location-dot"></i>
            <p class="add-second">India</p>
          </div>
        </div>

        <div class="nav-search">
          <select class="search-select">
            <option>All</option>
            <option>Ear Rings</option>
            <option>Necklace</option>
            <option>Braclets</option>
            <option>Rings</option>
          </select>
          <input
            type="text"
            placeholder="Search Jewellery"
            class="search-input"
          />
          <div class="search-icon">
            <i class="fa-solid fa-magnifying-glass"></i>
          </div>
        </div>

        <div class="nav-signin border">  
            <?php
                if(isset($_SESSION['email'])) {
                  $email = $_SESSION['email'];
                  $query = mysqli_query($connection, "SELECT users.* FROM `users` WHERE users.email = '$email'");
                  $row = mysqli_fetch_array($query);
                  echo "<a href='logout.php' id='greet'>
                    <p><span>Hello, </span></p>
                    <p class='nav-second'>" . $row['name'] . "</p>
                  </a>";
                } else{
                  echo "<a href='login.php' id='greet'>
                    <p><span>Hello, sign In</span></p>
                    <p class='nav-second'>Account</p>
                  </a>";
                }
            ?>
        </div>

        <div class="nav-retun border">
          <p><span>Returns</span></p>
          <p class="nav-second">&Orders</p>
        </div>

        <div class="nav-cart border nav-second">
          <a href="cart.php" style="color: #8c7176; text-decoration: none; cursor: pointer;">
            <i class="fa-solid fa-cart-shopping"></i> Cart</a> 
        </div>
      </div>

      <div class="panel">
        <div class="panel-all">
          <i class="fa-solid fa-bars"></i>
          All
        </div>

        <div class="panel-ops">
          <p>Today's Deals</p>
          <p>Buy Again</p>
          <p>Customer Service</p>
          <p>Gift Cards</p>
          <p>Registry</p>
          <p>Sell</p>
        </div>

        <div class="panel-deals">Shop Deals</div>
        <div class="panel-deals"><a href="api.php" style="color: white; text-decoration: none;">Metal Rates</a></div>
      </div>
    </header>
<body>
  <h1>Cart</h1>
  <table>
    <thead>
      <tr>
        <th>Product ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
      </tr>
    </thead>
    <tbody>
      <?php
    //   while($row = mysqli_fetch_assoc($result)) {
    //     echo "<tr>";
    //     echo "<td>".$row['product_id']."</td>";
    //     echo "<td>".$row['name']."</td>";
    //     echo "<td>".$row['price']."</td>";
    //     echo "<td>".$row['quantity']."</td>";
    //     echo "</tr>";
    //   }
      ?>
    </tbody>
  </table>
</body>
<footer style = "position: absolute; bottom: 0; width: 100%;">
      <div class="foot-panel1"><button onclick="topFunction()">Back To Top</button></div>

      <div class="foot-panel2">
        <ul>
          <p>Get to Know Us</p>
          <a>Careers</a>
          <a>Blog</a>
          <a>About NKJewels</a>
          <a>Investor Relations</a> 
        </ul>
      </div>

      <div class="foot-panel3">
        <div class="logo"></div>
      </div>

      <div class="foot-panel4">
        <div class="pages">
          <a>Conditions of Use</a>
          <a>Privacy Notice</a>
          <a>Your Ads Privacy Choices</a>
        </div>
        <div class="copyright">
          © 1996-2024, NKJewels.com, Inc. or its affiliates
        </div>
      </div>
    </footer>
</html>
