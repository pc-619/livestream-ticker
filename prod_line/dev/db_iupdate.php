<?php
    include("db_conn.php");

    $data = file_get_contents("php://input");
    
    $entry = json_decode($data, true);

    // get # of entries in database (no ID column cos we're outputting the rows onto the ticker)
    $sql_entry_count = "SELECT username, message FROM user_input";
    $result = mysqli_query($conn, $sql_entry_count);
    //echo mysqli_num_rows($result);
    if(mysqli_num_rows($result) == 0){
        $rowcount = 0;
    }
    else{
        $rowcount = mysqli_num_rows($result);
    }

    // Get ALL entries in database.
    $jsonData = array();
    while ($array = mysqli_fetch_row($result)){
        $jsonData[] = $array;
    }
    
    // Update count with # rows in database.
    // This is how the ticker knows how many messages are stored.
    $entry["msgCount"] = $rowcount;
    $entry["msgArr"] = $jsonData;
    //echo "HEY READ THIS " . $entry["msgArr"];



    echo json_encode($entry);
    //echo json_encode($jsonData);

    mysqli_close($conn);
?>