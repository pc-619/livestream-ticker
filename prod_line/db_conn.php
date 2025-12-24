<?php
    $db_server = "localhost";
    $db_user = "hamhus27_livestream_ticker";
    $db_pass = "0y5MVoM2t=";
    $db_name = "hamhus27_livestream_ticker";
    $conn = "";

    $conn = mysqli_connect($db_server,
                           $db_user,
                           $db_pass,
                           $db_name);

    if(!$conn){
        echo "You're likely seeing this ugly warning message because something went wrong connecting to the online database. This is the price of free hosting. Sorry.";
    }
?>