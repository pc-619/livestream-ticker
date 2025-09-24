<?php
    include("db_conn.php");

    $data = file_get_contents("php://input");
    
    $entry = json_decode($data, true);
    
    //echo $entry;

    // get # of entries in database
    $sql_entry_count = "SELECT * FROM user_input";
    $result = mysqli_query($conn, $sql_entry_count);
    //echo mysqli_num_rows($result);
    if(mysqli_num_rows($result) == 0){
        $rowcount = 0;
    }
    else{
        $rowcount = mysqli_num_rows($result);
    }
    
    // Update count with # rows in database.
    // This is how the ticker knows how many messages are stored.
    $entry["msgCount"] = $rowcount;
    echo json_encode($entry);
    
    // wipe database afterwards
    $sql_intermittent_reset = "DELETE FROM user_input";

    mysqli_query($conn, $sql_intermittent_reset);

    mysqli_close($conn);
?>