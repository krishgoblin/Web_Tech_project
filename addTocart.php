<?php
session_start();
include 'connect.php';

if(isset($_POST['add_to_cart'])) {
  $product_id = $_POST['product_id'];
  $quantity = 1; // Assuming quantity is fixed for now
  
  if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['email'];
    $query = "INSERT INTO cart (user_id, product_id, quantity) VALUES ($user_id, $product_id, $quantity)";
    mysqli_query($connection, $query);
    // Redirect to homepage or cart page after adding to cart
    header("Location: homepage.php");
    exit();
  } else {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
  }
}
?>
