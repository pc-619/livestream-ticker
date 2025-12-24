<?php
	include("database.php");

    extract($_REQUEST);

    $file = fopen("form-save.txt", "a");

    fwrite($file, "USERNAME: ");
    fwrite($file, $username . "\n");
    fwrite($file, "MESSAGE: ");
    fwrite($file, $message . "\n");
    fclose($file);

	$sql = "INSERT INTO user_input (username, message)
						VALUES ('$username', '$message')";

	try{
		mysqli_query($conn, $sql);
	}
	catch(mysqli_sql_exception){
		echo "Failed to send message. Try again?";
	}

	// Close connection
	// $conn exists -- it's in database.php. Disregard warning.
	mysqli_close($conn);
    header("location: dev.php");
?>