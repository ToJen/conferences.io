<?php
	// start the session
	session_start();

	// display errors for debugging purposes
	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);

	// retrieve user id
	$uid = $_SESSION["uid"];

	// connect to db
	include('mysql-conn.php');

	// Check connection
	// if ($conn->connect_error) {
	//     die("Connection failed: " . $conn->connect_error);
	// }
	// echo "Connected successfully";

  	// retrieve data to insert into db
  	$fname = $_POST["firstname"];
  	$lname = $_POST["lastname"];
  	$email = $_POST["email"];
  	$uname = $_POST["username"];
  	$pass  = $_POST["password"];
  	$bdate = $_POST["date"];
  	$sex   = $_POST["sex"];
  	$job   = $_POST["job"];
  	$comp  = $_POST["company"];
  	$desc  = $_POST["description"];
  	$add   = $_POST["address"];
  	$phno  = $_POST["phoneno"];
  	$web   = $_POST["website"];
  	$lin   = $_POST["linkedin"];
  	$fb    = $_POST["facebook"];
  	$twt   = $_POST["twitter"];
  	$inst  = $_POST["instagram"];
  	$gplus = $_POST["googleplus"];

  	// format date as yyyy-mm-dd
  	$bdate = substr($bdate,6) . '-' . substr($bdate,3,2) . '-' . substr($bdate,0,2);

  	// add http prefix to websites if set
  	if(trim($web)   !== '')   $web = 'http://' . $web;
  	if(trim($lin)   !== '')   $lin = 'http://' . $lin;
  	if(trim($fb)    !== '')    $fb = 'http://' . $fb;
  	if(trim($twt)   !== '')   $twt = 'http://' . $twt;
  	if(trim($inst)  !== '')  $inst = 'http://' . $inst;
  	if(trim($gplus) !== '') $gplus = 'http://' . $gplus;

  	if(trim($pass) === '')
  	{
  		// update info without change in password
	  	$sql = "UPDATE User SET firstName='$fname', lastName='$lname', email='$email', username='$uname', birthDate='$bdate', sex='$sex', 
  			jobTitle='$job', company='$comp', description='$desc', address='$add', phoneNo='$phno', website='$web', linkedIn='$lin', facebook='$fb', 
  			twitter='$twt', instagram='$inst', googlePlus='$gplus' WHERE userID=$uid;";
  	}
  	else
  	{
  		// update info with change in password
	  	$sql = "UPDATE User SET firstName='$fname', lastName='$lname', email='$email', username='$uname', password='$pass', birthDate='$bdate', sex='$sex', 
  			jobTitle='$job', company='$comp', description='$desc', address='$add', phoneNo='$phno', website='$web', linkedIn='$lin', facebook='$fb', 
  			twitter='$twt', instagram='$inst', googlePlus='$gplus' WHERE userID=$uid;";
  	}

  	// run query and check if successful or not
  	if($conn->query($sql) === TRUE)
  	{
  		// close sql connection
  		$conn->close();

  		// update first and last name in session
  		$_SESSION["firstName"] = $fname;
  		$_SESSION["lastName"]  = $lname;

  		// redirect user to profile page
  		die(header("location:profile.php?updateSucess=1"));
  	}
  	else
   		printf("Query failed: %s", $conn->error);
  	
  	// close sql connection
  	$conn->close();
?>