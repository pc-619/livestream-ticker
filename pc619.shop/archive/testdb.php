<?php
// Database configuration
$host     = 'localhost';     // Usually 'localhost'
$username = 'hamhus27_livestream_ticker'; // Replace with your DB username
$password = '0y5MVoM2t='; // Replace with your DB password
$database = 'hamhus27_livestream_ticker'; // Replace with your DB name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
} else {
    echo "✅ Successfully connected to the database!";
}

// Close connection
$conn->close();
?>