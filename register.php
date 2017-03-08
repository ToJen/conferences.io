<?php
	// variables for sql connection
	$servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mun_conferences";

    // establish sql connection
  	$conn = new mysqli($servername, $username, $password, $database);

  	if($conn)
  		printf("Connection successful!" . "\n");
  	else
  		printf("Connection failed: %s" . "\n", $conn->error);

  	// retrieve data to insert into db
  	$fname = $_POST["firstname"];
  	$lname = $_POST["lastname"];
  	$email = $_POST["email"];
  	$pass  = $_POST["password"];
  	$date  = $_POST["date"];
  	$sex   = $_POST["sex"];

  	// format date as yyyy-mm-dd
  	$date = substr($date,6) . '-' . substr($date,3,2) . '-' . substr($date,0,2);

  	// set value of sex as boolean
  	if(strcmp($sex, 'M')) $sex = 0;
  	else 				  $sex = 1;

  	// insert data in db
  	$sql = "INSERT INTO User(firstName,lastName,eMail,username,password,birthDate,sex) VALUES('$fname','$lname','$email','$email','$pass','$date','$sex');";

	if($conn->query($sql) === TRUE)			// if successful
		printf("Query successful!" . "\n");
	else 									// otherwise
 		printf("Query failed: %s" . "\n", $conn->error);
	
	// close sql connection
	$conn->close();
?>