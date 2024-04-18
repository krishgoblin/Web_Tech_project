<?php 
session_start();
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Juelri</title>
        <link
          rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"
        />
        <link rel="stylesheet" href="./style.css" />

        <style>
            .price{
                text-align: center;
                text-decoration: wavy;
                font-size: large;
                text-shadow: 1%;
            }
        </style>

        <script>

            // const url = 'https://gold-rates-india.p.rapidapi.com/api/gold-rates';
            // const options = {
            //     method: 'GET',
            //     headers: {
            //         'X-RapidAPI-Key': 'SIGN-UP-FOR-KEY',
            //         'X-RapidAPI-Host': 'gold-rates-india.p.rapidapi.com'
            //     }
            // };


            function fetchGoldRates() {
                var myHeaders = new Headers();
                myHeaders.append("x-access-token", "goldapi-17bx0zslv0fukly-io");
                myHeaders.append("Content-Type", "application/json");

                var requestOptions = {
                    method: 'GET',
                    headers: myHeaders,
                    redirect: 'follow'
                };
                
                fetch("https://www.goldapi.io/api/XAU/INR", requestOptions)
                    .then(response => response.json())
                    .then((result) => {
                        const gold = document.getElementById("gold");
                        const price = document.createElement("p");
                        price.innerHTML = "";
                        gold.appendChild(price);
                        price.innerHTML = "Price: ₹"+ result.price_gram_24k;
                        price.setAttribute("class", "price");
                        gold.appendChild(price);
                    })
                    .catch(error => console.log('error', error));


                fetch("https://www.goldapi.io/api/XAG/INR", requestOptions)
                    .then(response => response.json())
                    .then((result) => {
                        const silver = document.getElementById("silver");
                        const price = document.createElement("p");
                        price.innerHTML = "";
                        silver.appendChild(price);
                        price.innerHTML = "Price: ₹"+ result.price_gram_24k;
                        price.setAttribute("class", "price");
                        silver.appendChild(price);
                    })
                    .catch(error => console.log('error', error));


                fetch("https://www.goldapi.io/api/XPT/INR", requestOptions)
                    .then(response => response.json())
                    .then((result) => {
                        const platinum = document.getElementById("platinum");
                        const price = document.createElement("p");
                        price.innerHTML = "";
                        platinum.appendChild(price);
                        price.innerHTML = "Price: ₹"+ result.price_gram_24k;
                        price.setAttribute("class", "price");
                        platinum.appendChild(price);
                    })
                    .catch(error => console.log('error', error));


                fetch("https://www.goldapi.io/api/XAU/INR", requestOptions)
                    .then(response => response.json())
                    .then((result) => {
                        const palladium = document.getElementById("palladium");
                        const price = document.createElement("p");
                        price.innerHTML = "";
                        palladium.appendChild(price);
                        price.innerHTML = "Price: ₹"+ result.price_gram_24k;
                        price.setAttribute("class", "price");
                        palladium.appendChild(price);
                    })
                    .catch(error => console.log('error', error));


                    // setTimeout(fetchGoldRates, 5000); // Refresh rates every 5 seconds (5000 milliseconds)
                }

                // Initial call to start fetching rates
                fetchGoldRates();
        </script>
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

    <main>
        <div class="shop-section">
            <div class="box">
                <div class="box-content" id="gold">
                    <h2>Gold</h2>
                    <div class="box-img" style="background-image: url('./jewelleryAssets/Gold.jpeg')"></div>
                </div>
            </div>
            <div class="box">
                <div class="box-content" id = "silver">
                    <h2>Silver</h2>
                    <div class="box-img" style="background-image: url('./jewelleryAssets/Silver.jpeg')"></div>
                </div>
            </div>
            <div class="box">
                <div class="box-content" id = "platinum">
                    <h2>platinum</h2>
                    <div class="box-img" style="background-image: url('./jewelleryAssets/Platinum.jpeg')"></div>
                </div>
            </div>
            <div class="box">
                <div class="box-content" id = "palladium">
                    <h2>Palladium</h2>
                    <div class="box-img" style="background-image: url('./jewelleryAssets/Palladium.jpeg')"></div>
                </div>
            </div>
            <!-- Add more boxes for other ear rings -->
        </div>
    </main>

    <footer>
        <div class="foot-panel1">Back To Top</div>
  
        <div class="foot-panel2">
          <ul>
            <p>Get to Know Us</p>
            <a>Careers</a>
            <a>Blog</a>
            <a>About Juelri</a>
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
            © 1996-2024, Juelri.com, Inc. or its affiliates
          </div>
        </div>
      </footer>
</body>
</html>
