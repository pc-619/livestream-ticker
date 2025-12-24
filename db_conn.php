<?php

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "livestream_ticker";
    $conn = "";

    $conn = mysqli_connect($db_server,
                           $db_user,
                           $db_pass,
                           $db_name);

    if(!$conn){
        echo "You're likely seeing this ugly warning message because something went wrong connecting to the online database. This is the price of free hosting. Sorry.";
    }
?>