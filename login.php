<?php
// Assuming you have a database connection established
$hostname = "127.0.0.1"; // Hostname
$username = "myadmin"; // MySQL username
$password = "Skrish_73"; // MySQL password
$database = "nkjewels"; // MySQL database name

// Create connection
$connection = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["pass"];

    // Simple validation example (checking for empty fields and minimum password length)
    if (empty($username) || empty($password)) {
        header("Location: login.html");
        exit(); // Stop further execution
    }

    // Prepare and execute the SQL query using prepared statements
    $query = "SELECT username, password FROM users WHERE username = ? AND password = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Login successful
        header("Location: index.html");
        exit(); // Stop further execution
    } else {
        // Login failed
        header("Location: login.html");
        exit(); // Stop further execution
    }
}

// Close connection (This line will never be reached because of the earlier exit() calls after redirection)
$connection->close();
?>
