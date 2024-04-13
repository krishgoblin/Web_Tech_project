<?php

include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["pass"];

    // Simple validation example (checking for empty fields and minimum password length)
    if (empty($username) || empty($password)) {
        echo '<script>alert("Please Enter username and password")</script>';
        echo '<script>window.location.href = "login.html";</script>';
        exit(); // Stop further execution
    }

    // Prepare and execute the SQL query using prepared statements
    $query = "SELECT username, hashed_password , email FROM users WHERE username = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Later, when verifying the password
    

    if ($result->num_rows == 1) {
        
        $row = $result->fetch_assoc();
        // Accessing data from the fetched row
        $hashed_password = $row['hashed_password'];
        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Password is correct
            session_start();
            $_SESSION['email'] = $row['email'];
            echo '<script>alert("Login Successfull")</script>';
            echo '<script>window.location.href = "homepage.php";</script>';
            exit(); // Stop further execution
        } else {
            echo '<script>alert("Invalid Credentials")</script>';
            echo '<script>window.location.href = "login.html";</script>';
            exit(); // Stop further execution
        }
        // Login successful
        
    } else {
        // Login failed
        echo '<script>alert("Invalid Credentials")</script>';
        echo '<script>window.location.href = "login.html";</script>';
        exit(); // Stop further execution
    }
}

// Close connection (This line will never be reached because of the earlier exit() calls after redirection)
$connection->close();
?>
