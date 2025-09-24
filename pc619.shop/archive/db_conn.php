<?php
// Database configuration
$host     = 'localhost';     // Usually 'localhost'
$username = 'hamhus27_livestream_ticker'; // Replace with your DB username
$password = '0y5MVoM2t='; // Replace with your DB password
$database = 'hamhus27_livestream_ticker'; // Replace with your DB name

    $conn = new mysqli($host,
                       $username,
                       $password,
                       $database);

    if(!$conn){
        echo "You're likely seeing this ugly warning message because something went wrong connecting to the online database. This is the price of free hosting. Sorry.";
    }

// Close connection
//$conn->close();
?>