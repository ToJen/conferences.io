<?php
    // start session
    session_start();

    // variables for sql connection 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mun_conferences";

    // establish sql connection
    $conn = new mysqli($servername, $username, $password, $database);

    // retrieve username and password
    $uname = $_POST['username'];
    $pass = $_POST['password'];

    // check if username and password exists in db
    $sql = "SELECT firstName, lastName FROM User WHERE username='$uname' AND password='$pass';";

    // run and save results of query
    $result = $conn->query($sql);

    // Handle results
    if($result->num_rows == 1)
    {
        while($row = $result->fetch_assoc()) 
        {
            $fname  = $row["firstName"];
            $lname  = $row["lastName"];
        }
        
        // set the session vars
        $_SESSION["firstName"] = $fname;
        $_SESSION["lastName"] = $lname;

        // close sql connection
        $conn->close();

        // redirect user to home page
        die(header("location:index.php"));
    }
    else
        printf("Query failed: %s", $conn->error);
    
    // close sql connection
    $conn->close();
?>