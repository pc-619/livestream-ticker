<?php
    include("db_conn.php");

    $sql_intermittent_reset = "DELETE FROM user_input";
    
    mysqli_query($conn, $sql_intermittent_reset);
?>