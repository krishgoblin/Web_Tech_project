<?php
// include 'login.php';
// session_unset();
session_destroy();
echo '<script>window.location.href = "login.html";</script>';     //delete the client side cookies afterwards
exit();
?>