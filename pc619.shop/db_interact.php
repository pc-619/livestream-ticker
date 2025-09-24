<?php

	include("db_conn.php");
    // Execute upon form submission.
    //foreach($_SERVER as $key => $value){
    //    echo "{$key} = {$value} <br>";
    //}

    //$rows = array("DUMMY_USER"=>"DUMMY_MESSAGE");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = file_get_contents("php://input");
        
        $entry = json_decode($data, true);

	//$username = $entry["username"];
	//$message  = $entry["message"];

        $username = filter_var($entry["username"], FILTER_SANITIZE_SPECIAL_CHARS);
        $message  = filter_var($entry["message"], FILTER_SANITIZE_SPECIAL_CHARS);
        
        //echo "NEW MESSAGE: " . $message;
        
        //$message  = filter_input(INPUT_POST, "message", FILTER_SANITIZE_SPECIAL_CHARS);
	//$message = filter_var_array(json_decode($data, true), [
	//	'username' => [ 'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
	//			'flags'  => FILTER_NULL_ON_FAILURE ],
	//	'message'  => [ 'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
	//			'flags'  => FILTER_NULL_ON_FAILURE ],
	//	]);
	//
	//var_dump($message);

        $sql_new_entry   = "INSERT INTO user_input (username, message)
                            VALUES ('$username', '$message')";
        $sql_entry_count = "SELECT * FROM user_input";

        // Create new entry with user input in SQL database.
        mysqli_query($conn, $sql_new_entry);

        // Return table rows count from SQL.
            //$sql_entry_count = "SELECT * FROM user_input";
            $result = mysqli_query($conn, $sql_entry_count);
            $rowcount = mysqli_num_rows($result);
            // Update count with # rows in database.
            // This is how the ticker knows how many messages are stored.
            $entry["count"] = $rowcount;
            echo json_encode($entry);

    }

    extract($_REQUEST);

    $file = fopen("msg-entries.txt", "a");

    fwrite($file, "USERNAME: ");
    fwrite($file, $username . "\n");
    fwrite($file, "MESSAGE: ");
    fwrite($file, $message . "\n");
    fclose($file);
    
	// Close connection
	// $conn exists -- it's in db_conn.php. Disregard warning.
	mysqli_close($conn);
?>