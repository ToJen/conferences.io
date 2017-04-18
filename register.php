<?php
  	// connect to db
    include('mysql-conn.php');

  	// retrieve data to insert into db
  	$fname = $_POST["firstname"];
  	$lname = $_POST["lastname"];
  	$email = $_POST["email"];
  	$pass  = $_POST["password"];
  	$bdate = $_POST["date"];
  	$sex   = $_POST["sex"];

  	// format date as yyyy-mm-dd
  	$bdate = substr($bdate,6) . '-' . substr($bdate,3,2) . '-' . substr($bdate,0,2);

  	// insert data in db
  	$sql = "INSERT INTO User(firstName,lastName,email,username,password,birthDate,sex) VALUES('$fname','$lname','$email','$email','$pass','$bdate','$sex');";

  	// run query and check if successful or not
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