<?php
	// start session
	session_start();

	// retrieve session vars
	$uid = $_SESSION["uid"];
	$fname = $_SESSION["firstName"];
	$lname = $_SESSION["lastName"];

	// variables for sql connection 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mun_conferences";

    // establish sql connection
    $conn = new mysqli($servername, $username, $password, $database);

    // check if username and password exists in db
    $sql = "SELECT email, username, birthDate, address, profilePic, description, jobTitle, company, phoneNo, website, linkedIn, facebook, twitter, instagram, googlePlus  FROM User WHERE userID = '$uid';";

    // run and save results of query
    $result = $conn->query($sql);

    // handle results
    if($result->num_rows == 1)
    {
        // fetch required fields
        while($row = $result->fetch_assoc()) 
        {
            // save data
            $email = $row["email"];
            $uname = $row["username"];
            $bday  = $row["birthDate"];
            $add   = $row["address"];
            $pic   = $row["profilePic"];
            $desc  = $row["description"];
            $job   = $row["jobTitle"];
            $comp  = $row["company"];
            $phno  = $row["phoneNo"];
            $web   = $row["website"];
            $lin   = $row["linkedIn"];
            $fb    = $row["facebook"];
            $twt   = $row["twitter"];
            $inst  = $row["instagram"];
            $gplus = $row["googlePlus"];
        }
    }

    // close sql connection
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <title>My Profile - MUN Conferences</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="css/profile.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

	<body>
	    <?php include("header.php") ?>
		<br>
	    <br>
        <div class="row" style="background-color: #00B398;">
        	<div class="col-xs-12 text-center">
        		<img class="img-circle" style="margin-top: 30px; border: 4px solid white; background: white;" src="imgs/profile.png" width="100px" height="100px">
        		<h4 style="color: white;"><?php echo "$fname $lname"; ?></h4>
        		<h5 style="color: white;"><?php echo "($uname)"; ?></h3>
        	</div>
        </div>

        <div class="row">
	        <div class="col-xs-12 text-center">
        		<div class="h4" style="color: #00B398;"><b><?php if($job === NULL) echo "Job title"; else echo "$job"; ?></b></div>
        		<div class="h5"><?php if($comp === NULL) echo "Company name"; else echo "$comp"; ?></div>
		    </div>
	    </div>
	    <br>

        <div class="row">
	        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
	        	<div class="panel">
		        	<div class="panel-heading">Description</div>
	        		<div class="panel-body text-justify"><?php if($desc === NULL) echo "Description not available"; else echo "$desc"; ?></div>
		    	</div>
	    	</div>
	    </div>

	    <div class="row">
	        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
	        	<div class="panel">
	        		<div class="panel-heading">Birthday</div>
	        		<div class="panel-body"><?php echo "$bday"; ?></div>
        		</div>
        	</div>
	    </div>

	    <div class="row">
	    	<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
	        	<div class="panel">
	        		<div class="panel-heading">Address</div>
	        		<div class="panel-body"><?php if($add === NULL) echo "Address not set"; else echo "$add"; ?></div>
        		</div>
		    </div>
	    </div>

	    <div class="row">
	        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
	        	<div class="panel">
	        		<div class="panel-heading">Email</div>
	        		<div class="panel-body"><a href="mailto:jdoe@email.ca"><?php echo "$email"; ?></a></div>
        		</div>
        	</div>
	    </div>

	    <div class="row">
	   		<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
	        	<div class="panel">
	        		<div class="panel-heading">Phone number</div>
	        		<div class="panel-body"><?php if($phno === NULL) echo "Phone number not set"; else echo "$phno"; ?></div>
        		</div>
		    </div>
	    </div>

	    <div class="row">
	   		<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
	        	<div class="panel">
	        		<div class="panel-heading">Website</div>
	        		<div class="panel-body"><?php if($web === NULL) echo "Website not set"; else echo "$web"; ?></div>
        		</div>
		    </div>
	    </div>

	    <div class="row">
	   		<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
	   			<div class="panel">
	        		<div class="panel-heading">Social media</div>
	        		<div class="panel-body text-center">
	        			<?php
			    		if($lin   !== NULL) echo "<a href=\"$lin\"><i class=\"fa fa-linkedin\"></i></a>";
			    		else   				echo "<a><i class=\"fa fa-linkedin inactive\"></i></a>";

			    		if($fb    !== NULL) echo "<a href=\"$fb\"><i class=\"fa fa-facebook\"></i></a>";
			    		else   				echo "<a><i class=\"fa fa-facebook inactive\"></i></a>";

			    		if($twt   !== NULL) echo "<a href=\"$twt\"><i class=\"fa fa-twitter\"></i></a>";
			    		else   				echo "<a><i class=\"fa fa-twitter inactive\"></i></a>";

			    		if($inst  !== NULL) echo "<a href=\"$inst\"><i class=\"fa fa-instagram\"></i></a>";
			    		else   				echo "<a><i class=\"fa fa-instagram inactive\"></i></a>";

			    		if($gplus !== NULL) echo "<a href=\"$gplus\"><i class=\"fa fa-google-plus\"></i></a>";
			    		else   				echo "<a><i class=\"fa fa-google-plus inactive\"></i></a>";
			    		?>
		    		</div>
		    	</div>
		    </div>
	    </div>

	    <div class="row">
	   		<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
	   			<div class="text-center">
	   				<a class="btn btn-primary" href="edit-profile.php">Edit Profile</a>
	   			</div>
		    </div>
	    </div>

	    <br>
	    <br>
	    <?php include("footer.php") ?>
	</body>
</html>