<?php
	// start session
	session_start();

	// retrieve session vars
	$uid = $_SESSION["uid"];
	$fname = $_SESSION["firstName"];
	$lname = $_SESSION["lastName"];

	// connect to db
	include('mysql-conn.php');

    // retrieve user details
    $sql = "SELECT email, username, birthDate, sex, address, profilePic, description, jobTitle, company, phoneNo, website, linkedIn, facebook, twitter, instagram, googlePlus  FROM User WHERE userID = '$uid';";

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
            $sex   = $row["sex"];
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
    $web = str_replace('http://', '', $web);
    $lin = str_replace('http://', '', $lin);
    $fb = str_replace('http://', '', $fb);
    $twt = str_replace('http://', '', $twt);
    $inst = str_replace('http://', '', $inst);
    $gplus = str_replace('http://', '', $gplus);

    // close sql connection
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <title>Edit Profile - MUN Conferences</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
		<link rel="stylesheet" href="jquery.imgareaselect-0.9.10/css/imgareaselect-default.css" />
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
		<script type="text/javascript" src="jquery.imgareaselect-0.9.10/scripts/jquery.imgareaselect.min.js"></script>
		<script type="text/javascript" src="js/email.js"></script>
		<script type="text/javascript" src="js/datepicker.js"></script>
		<script type="text/javascript" src="js/textarea-feedback.js"></script>
		<script type="text/javascript" src="js/jquery.form.min.js"></script>
		<script type="text/javascript" src="js/crop-save.js"></script>
		<script type="text/javascript" src="js/edit-profile.js"></script>
	</head>

	<body>
		<?php include('header.php'); ?>
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

	    <div class="container">    
	        <div id="signupbox" style="margin-top:50px" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
		        <div class="panel panel-info">
		            <div class="panel-heading">
		                <div class="panel-title">Edit Profile</div>
			        </div>
			        <div class="panel-body" >
		              	<form id="edit-profile" action="update-profile.php" data-toggle="validator" method="post" class="form-horizontal" role="form">
		              		<div class="form-group">
		              			<label for="profile-picture" class="col-md-3 control-label">Profile picture</label>
		              			<div class="col-md-8">
			              			<img id="profile-picture" <?php if($pic === NULL) echo "src=\"imgs/profile.png\""; else echo "src=\"$pic\""; ?> width="100px" height="100px">
			              			<br><br>
			              			<button type="button" id="update-pic" class="btn btn-primary" data-toggle="modal" data-target="#profile-pic-modal">Update</button>
				        		</div>
		              		</div>
		              		<br>

			                <div class="form-group">
			                    <label for="firstname" class="col-md-3 control-label">First name</label>
			                    <div class="col-md-8">
									<input type="text" id="firstname" class="form-control" name="firstname" placeholder="First Name" data-error="First name required" <?php echo "value=\"$fname\""; ?> required>
									<div class="help-block with-errors"></div>
				                </div>
			                </div>

				            <div class="form-group">
			                    <label for="lastname" class="col-md-3 control-label">Last name</label>
			                    <div class="col-md-8">
				                    <input type="text" id="lastname" class="form-control" name="lastname" placeholder="Last Name" data-error="Last name required" <?php echo "value=\"$lname\""; ?> required>
									<div class="help-block with-errors"></div>
				                </div>
				            </div>

			                <div class="form-group">
			                    <label for="email" class="col-md-3 control-label">Email</label>
			                    <div class="col-md-8">
			                    	<div id="emailDiv">
			                      	<input type="email" id="email" class="form-control" name="email" placeholder="Email Address" onkeyup="checkEmail();" data-error="Invalid email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}" <?php echo "value=\"$email\""; ?> required></div>
			                      	<div class="help-block with-errors"></div>
			                      	<div id="emailErr" class="text-danger hidden">Email already in use</div>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="username" class="col-md-3 control-label">Username</label>
			                    <div class="col-md-8">
				                    <input type="text" id="username" class="form-control" name="username" placeholder="Username" data-error="Username required" <?php echo "value=\"$uname\""; ?> required>
									<div class="help-block with-errors"></div>
				                </div>
				            </div>

			                <div class="form-group">
			                    <label for="password" class="col-md-3 control-label">New Password</label>
			                    <div class="col-md-8">
			                      	<input type="password" data-minlength="6" id="password" class="form-control" name="password" placeholder="New Password">
			                      	<div class="help-block">Password should be at least 6 characters</div>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="confirmPassword" class="col-md-3 control-label">Confirm password</label>
			                    <div class="col-md-8">
			                      	<input type="password" id="confirmPassword" class="form-control" name="confirmPassword" placeholder="Confirm password" data-error="Please confirm password" data-match="#password" data-match-error="Passwords do not match">
			                      	<div class="help-block with-errors"></div>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="date" class="col-md-3 control-label">Birthday</label>
			                    <div class="col-md-8">
									<input class="form-control" id="date" name="date" placeholder="DD/MM/YYYY" type="text" data-error="Birthday required" <?php echo "value=\"$bday\""; ?> required>
			                      	<div class="help-block with-errors"></div>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label class="col-md-3 control-label">Sex</label>
			                    <div class="col-md-8">
			                      	<div class="radio">
			                    		<label for="male">	
											<input id="male" type="radio" class="form-horizontal" name="sex" value="M" required <?php if($sex === 'M') echo "checked"; ?>> M
										</label>
									</div>
									<div class="radio">
										<label for="female">
			                      			<input id="female" type="radio" class="form-horizontal" name="sex" value="F" required <?php if($sex === 'F') echo "checked"; ?>> F
			                      		</label>
			                      	</div>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="job" class="col-md-3 control-label">Job title</label>
			                    <div class="col-md-8">
				                    <input type="text" id="job" class="form-control" name="job" placeholder="Job title" 
				                    <?php if($job !== NULL) echo "value=\"$job\""; ?>>
				                </div>
				            </div>

				            <div class="form-group">
			                    <label for="company" class="col-md-3 control-label">Company name</label>
			                    <div class="col-md-8">
				                    <input type="text" id="company" class="form-control" name="company" placeholder="Company name" 
				                    <?php if($comp !== NULL) echo "value=\"$comp\""; ?>>
				                </div>
				            </div>

			                <div class="form-group">
			                    <label for="textarea" class="col-md-3 control-label">Description</label>
			                    <div class="col-md-8">
				                    <textarea id="textarea" class="form-control" name="description" placeholder="Short description about yourself" form="edit-profile" maxlength="255" rows="5"><?php if($desc !== NULL) echo "$desc"; ?></textarea>
				                    <div id="textarea-feedback" class="help-block"></div>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="address" class="col-md-3 control-label">Address</label>
			                    <div class="col-md-8">
				                    <input type="text" id="address" class="form-control" name="address" placeholder="Address" 
				                    <?php if($add !== NULL) echo "value=\"$add\""; ?>>
				                </div>
				            </div>

				            <div class="form-group">
			                    <label for="phno" class="col-md-3 control-label">Phone number</label>
			                    <div class="col-md-8">
				                    <input type="text" id="phno" class="form-control" name="phoneno" placeholder="Phone number" 
				                    <?php if($phno !== NULL) echo "value=\"$phno\""; ?>>
				                </div>
				            </div>

				            <div class="form-group">
			                    <label for="website" class="col-md-3 control-label">Website</label>
			                    <div class="col-md-8">
				                    <input type="text" id="website" class="form-control" name="website" placeholder="Website" 
				                    <?php if($web !== NULL) echo "value=\"$web\""; ?>>
				                </div>
				            </div>

				            <div class="form-group">
			                    <label for="linkedin" class="col-md-3 control-label">LinkedIn</label>
			                    <div class="col-md-8">
				                    <input type="text" id="linkedin" class="form-control" name="linkedin" placeholder="LinkedIn" 
				                    <?php if($lin !== NULL) echo "value=\"$lin\""; ?>>
				                </div>
				            </div>

				            <div class="form-group">
			                    <label for="facebook" class="col-md-3 control-label">Facebook</label>
			                    <div class="col-md-8">
				                    <input type="text" id="facebook" class="form-control" name="facebook" placeholder="Facebook" 
				                    <?php if($fb !== NULL) echo "value=\"$fb\""; ?>>
				                </div>
				            </div>

				            <div class="form-group">
			                    <label for="twitter" class="col-md-3 control-label">Twitter</label>
			                    <div class="col-md-8">
				                    <input type="text" id="twitter" class="form-control" name="twitter" placeholder="Twitter" 
				                    <?php if($twt !== NULL) echo "value=\"$twt\""; ?>>
				                </div>
				            </div>

				            <div class="form-group">
			                    <label for="instagram" class="col-md-3 control-label">Instagram</label>
			                    <div class="col-md-8">
				                    <input type="text" id="instagram" class="form-control" name="instagram" placeholder="Instagram" 
				                    <?php if($inst !== NULL) echo "value=\"$inst\""; ?>>
				                </div>
				            </div>

				            <div class="form-group">
			                    <label for="googleplus" class="col-md-3 control-label">Google+</label>
			                    <div class="col-md-8">
				                    <input type="text" id="googleplus" class="form-control" name="googleplus" placeholder="Google+" 
				                    <?php if($gplus !== NULL) echo "value=\"$glus\""; ?>>
				                </div>
				            </div>
				            <br>
				            <br>
			                <div class="form-group">                       
			                    <div class="col-md-8 text-center">
			                      <input id="submit" type="submit" name="submit" class="btn btn-primary" value="Apply Changes">&nbsp;&nbsp;
			                      <a class="btn btn-danger" href="profile.php">Cancel</a>
			                    </div>
			                </div>                      
						</form>
		          	</div>
		        </div>
	        </div>
	    </div>
	    <br><br>
	    <?php include("footer.php"); ?>
	</body>
</html>