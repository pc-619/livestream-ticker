<?php
	include("db_conn.php");
	//echo("db_interact.php starting");
	
	// Execute upon form submission.
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = file_get_contents("php://input");
        
        $entry = json_decode($data, true);
        
        //echo $entry["username"];
        //echo $entry["message"];
        //echo $entry["count"];

        $username = $entry["username"];
        $message  = $entry["message"];

        $sql_new_entry   = "INSERT INTO user_input (username, message)
                            VALUES ('$username', '$message')";
        $sql_entry_count = "SELECT * FROM user_input";

        // Create new entry with user input in SQL database.
        mysqli_query($conn, $sql_new_entry);
        // Return table rows count from SQL.
        //echo "This echo is right before the SQL query.";
            //$sql_entry_count = "SELECT * FROM user_input";
            $result = mysqli_query($conn, $sql_entry_count);
            $rowcount = mysqli_num_rows($result);
            // Update count with # rows in database.
            // This is how the ticker knows how many messages are stored.
            $entry["count"] = $rowcount;
            echo json_encode($entry);

        //if(empty($username)){
        //    echo "Invalid user";
        //}
        //elseif(empty($message)){
        //    echo "Invalid message";
        //}
        // Case for valid input.
        //else{
        //    //echo "Hello {$username}";
        //}
    }

    extract($_REQUEST);

    $file = fopen("msg-entries.txt", "a");

    fwrite($file, "USERNAME: ");
    fwrite($file, $username . "\n");
    fwrite($file, "MESSAGE: ");
    fwrite($file, $message . "\n");
    fclose($file);
    
    mysqli_close($conn);

?>