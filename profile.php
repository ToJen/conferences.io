<?php
	// start session
	session_start();

	// retrieve session vars
	$uid = $_SESSION["uid"];
	$fname = $_SESSION["firstName"];
	$lname = $_SESSION["lastName"];

	// connect to db
	include('mysql-conn.php');

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
    
    // format birthday as dd/mm/yyyy
    $bday = substr($bday,8) . '/' . substr($bday,5,2) . '/' . substr($bday,0,4);

    // remove http prefix from websites
    $webval = str_replace('http://', '', $web);

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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="css/profile.css" />
		<link rel="stylesheet" href="jquery.imgareaselect-0.9.10/css/imgareaselect-default.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="jquery.imgareaselect-0.9.10/scripts/jquery.imgareaselect.min.js"></script>
		<script type="text/javascript" src="js/jquery.form.min.js"></script>
		<script type="text/javascript" src="js/crop-save.js"></script>
	</head>

	<body>
	    <?php include("header.php") ?>
		<br>
	    <br>

	    <!-- Modal dialog for image upload -->
		<div id="profile-pic-modal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="modal-title">Update Profile Picture</h3>
					</div>
					<div class="modal-body">
						<form id="crop-image" method="post" enctype="multipart/form-data" action="">
							<strong>Upload Image:</strong>
							<br>
							<br>
							<input type="file"   name="profile-pic" id="profile-pic" />
							<input type="hidden" name="hdn-x1-axis" id="hdn-x1-axis" value="" />
							<input type="hidden" name="hdn-y1-axis" id="hdn-y1-axis" value="" />
							<input type="hidden" name="hdn-x2-axis" value="" id="hdn-x2-axis" />
							<input type="hidden" name="hdn-y2-axis" value="" id="hdn-y2-axis" />
							<input type="hidden" name="hdn-thumb-width" id="hdn-thumb-width" value="" />
							<input type="hidden" name="hdn-thumb-height" id="hdn-thumb-height" value="" />
							<input type="hidden" name="action" value="" id="action" />
							<input type="hidden" name="image_name" value="" id="image_name" />
							<div id="preview-profile-pic"></div>
							<div id="thumbs" style="padding:5px; width:600px"></div>
						</form>
					</div>
					<div class="modal-footer">
						<button id="close-crop" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button id="save-crop" type="button" class="btn btn-primary">Crop &amp; Save</button>
					</div>
				</div>
			</div>
		</div>

        <div class="row" style="background-color: #00B398;">
        	<div class="col-xs-12 text-center">
        		<div class="edit-box">
        			<div class="edit"><a href="edit-profile.php"><i class="glyphicon glyphicon-pencil"></i></a></div>
        		</div>
        		<div class=" profile-pic">
	        		<a href="#" id="update-pic" data-toggle="modal" data-target="#profile-pic-modal"><img class="img-circle" id="profile-picture" <?php if($pic === NULL) echo "src=\"imgs/profile.png\""; else echo "src=\"$pic\""; ?> width="100px" height="100px"></a>
        		</div>
        		<h4 style="color: white;"><?php echo "$fname $lname"; ?></h4>
        		<h5 style="color: white;">
        		<?php 
	        		if($job === NULL || trim($job) === '') echo "Job title"; 
	        		else echo "$job"; 
	        		echo ", ";
	        		if($comp === NULL || trim($comp) === '') echo "Company name";
	        		else echo "$comp"; ?>
        		</h3>
        	</div>
        </div>
        <br>

        <?php 
	        if($_GET["updateSuccess"])
	        {
	        	echo "<div class=\"row\">";
	        	echo "<div class=\"col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4\">";
	            echo "<div class=\"alert alert-success text-center\"><strong>Profile successfully updated!</strong></div>";
	            echo "</div>";
	            echo "</div>";
	        }
        ?>

        <div class="row">
	        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
		    	<h4>About me</h4>
		    	<div><?php if($desc === NULL || trim($desc) === '') echo "Description not available"; else echo "$desc"; ?></div>
	    	</div>
	    </div>

	    <div class="row">
	        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
        		<h4>Birthday</h4>
		    	<div><?php echo "$bday"; ?></div>
        	</div>
	    </div>

	    <div class="row">
	    	<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
        		<h4>Address</h4>
		    	<div><?php if($add === NULL || trim($add) === '') echo "Address not set"; else echo "$add"; ?></div>
		    </div>
	    </div>

	    <div class="row">
	        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
        		<h4>Email</h4>
		    	<div><a <?php echo "href=\"mailto:$email\""; ?>><?php echo "$email"; ?></a></div>
        	</div>
	    </div>

	    <div class="row">
	   		<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
        		<h4>Phone number</h4>
		    	<div><?php if($phno === NULL || trim($phno) === '') echo "Phone number not set"; else echo "$phno"; ?></div>
		    </div>
	    </div>

	    <div class="row">
	   		<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
        		<h4>Website</h4>
		    	<div><?php if($web === NULL || trim($web) === '') echo "Website not set"; else echo "<a href=\"$web\">$webval</a>"; ?></div>
		    </div>
	    </div>

	    <div class="row">
	   		<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
		    	<h4>Social media</h4>
		    	<div>
		    		<?php
			    		if($lin   !== NULL && trim($lin) !== '') echo "<a href=\"$lin\"><i class=\"fa fa-linkedin\"></i></a>";
			    		else   				echo "<a><i class=\"fa fa-linkedin inactive\"></i></a>";

			    		if($fb    !== NULL && trim($fb) !== '') echo "<a href=\"$fb\"><i class=\"fa fa-facebook\"></i></a>";
			    		else   				echo "<a><i class=\"fa fa-facebook inactive\"></i></a>";

			    		if($twt   !== NULL && trim($twt) !== '') echo "<a href=\"$twt\"><i class=\"fa fa-twitter\"></i></a>";
			    		else   				echo "<a><i class=\"fa fa-twitter inactive\"></i></a>";

			    		if($inst  !== NULL && trim($inst) !== '') echo "<a href=\"$inst\"><i class=\"fa fa-instagram\"></i></a>";
			    		else   				echo "<a><i class=\"fa fa-instagram inactive\"></i></a>";

			    		if($gplus !== NULL && trim($gplus) !== '') echo "<a href=\"$gplus\"><i class=\"fa fa-google-plus\"></i></a>";
			    		else   				echo "<a><i class=\"fa fa-google-plus inactive\"></i></a>";
			    	?>			
			    </div>
		    </div>
	    </div>
	    <br>
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