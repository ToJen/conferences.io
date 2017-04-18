<?php
	// start session
	session_start();

	// retrieve user id
	$uid = $_SESSION["uid"];

	// connect to db
	include('mysql-conn.php');

	// get email
	$email = $_POST["email"];

	// check if user is already registered
	$sql = "SELECT userID FROM User WHERE eMail='$email'";

	// run and save results of query
	$result = $conn->query($sql);

	if($result->num_rows == 1)
	{
		// fetch required fields
        while($row = $result->fetch_assoc()) 
        {
			// check if email is same as signed in user
			if($row["userID"] === $uid)
				echo "false";
			else
				echo "true";
		}
	}
	else
		echo "false";
?>