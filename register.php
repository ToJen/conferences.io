<?php
  	// variables for sql connection
  	$servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mun_conferences";

    // establish sql connection
  	$conn = new mysqli($servername, $username, $password, $database);

    // for debugging
  	if($conn)
  		printf("Connection successful!");
  	else
  		printf("Connection failed: %s", $conn->error);

  	// retrieve data to insert into db
  	$fname = $_POST["firstname"];
  	$lname = $_POST["lastname"];
  	$email = $_POST["email"];
  	$pass  = $_POST["password"];
  	$bdate = $_POST["date"];
  	$sex   = $_POST["sex"];

  	// format date as yyyy-mm-dd
  	$date = substr($date,6) . '-' . substr($date,0,2) . '-' . substr($date,3,2);

  	// insert data in db
  	$sql = "INSERT INTO User(firstName,lastName,email,username,password,birthDate,sex) VALUES('$fname','$lname','$email','$email','$pass','$date','$sex');";

  	// check if query was successful
	if($conn->query($sql) === TRUE)
	{
		// close sql connection
		$conn->close();

		// redirect user with feedback
		die(header("location:signin.php?regSuccess=1"));
	}
	else
 		printf("Query failed: %s", $conn->error);
	
	// close sql connection
	$conn->close();
?>