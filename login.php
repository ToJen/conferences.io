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
    $sql = "SELECT userID, firstName, lastName FROM User WHERE username='$uname' AND password='$pass';";

    // run and save results of query
    $result = $conn->query($sql);

    // handle results
    if($result->num_rows == 1)
    {
        // fetch required fields
        while($row = $result->fetch_assoc()) 
        {
            // set session vars
            $_SESSION["uid"] = $row["userID"];
            $_SESSION["firstName"]  = $row["firstName"];
            $_SESSION["lastName"]  = $row["lastName"];
        }

        // close sql connection
        $conn->close();

        // redirect user to home page
        die(header("location:index.php"));
    }
    else
    {
        // close sql connection
        $conn->close();

        // redirect user to sign in page with error
        die(header("location:signin.php?loginError=1"));
    }
?>