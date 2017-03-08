<?php
	// variables for sql connection
	$servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mun_conferences";

    // establish sql connection
  	$conn = new mysqli($servername, $username, $password, $database);

  	// get email
  	$email = $_POST["email"];

	// check if user is already registered
  	$sql = "SELECT userID FROM User WHERE eMail='$email'";

    // run and save results of query
    $result = $conn->query($sql);

    if($result->num_rows == 1)
    	echo "true";
    else
    	echo "false";
?>