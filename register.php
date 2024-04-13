<?php

include 'connect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $confirmpass = $_POST["conPass"];

    if (empty($username) || empty($password) || empty($name) || empty($email)) {
        echo '<script>alert("Please Enter the Details!");</script>';
        echo '<script>window.location.href = "login.html";</script>';
        exit(); // Stop further execution
    }

    if($confirmpass !== $password){
        echo '<script>alert("Confirm Password does not match.");</script>';
        echo '<script>window.location.href = "login.html";</script>';
        exit(); // Stop further execution
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // Store $hashed_password in the database
    echo '<script>console.log(' . $hashed_password . ')</script>';
    $query = "INSERT INTO users(username, hashed_password, name, email) VALUES(?, ?, ?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ssss", $username, $hashed_password, $name, $email);
    $stmt->execute();
    
    if ($stmt->affected_rows == 1) {
        // Registration successful
        echo '<script>alert("User Registered");</script>';
        echo '<script>window.location.href = "login.html";</script>';
        exit(); // Stop further execution
    } else {
        // Registration failed
        echo '<script>alert("Registration failed due to some errors. Please try again later.");</script>';
        echo '<script>window.location.href = "login.html";</script>';
        exit(); // Stop further execution
    }
}

?>
