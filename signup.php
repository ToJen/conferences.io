<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <title>Sign Up - MUN Conferences</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<script type="text/javascript" src="js/email.js"></script>
		<script type="text/javascript" src="js/datepicker.js"></script>
	</head>
	<body>
		<?php include('header.php'); ?>
		<br>
		<br>

	    <div class="container">    
	        <div id="signupbox" style="margin-top:50px" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
		        <div class="panel panel-info">
		            <div class="panel-heading">
		                <div class="panel-title">Sign Up</div>
		                <div style="float:right; font-size: 85%; position: relative; top:-10px">
		                	<a id="signinlink" href="signin.php">I already have an account</a>
		                </div>
			        </div>
			        <div class="panel-body" >
		              	<form id="signupform" action="register.php" data-toggle="validator" method="post" class="form-horizontal" role="form">
			                <div id="signupalert" style="display:none" class="alert alert-danger">
			                    <p>Error:</p>
			                    <span></span>
							</div>
			                
			                <div class="form-group">
			                    <label for="firstname" class="col-md-3 control-label">First Name</label>
			                    <div class="col-md-9">
									<input type="text" id="firstname" class="form-control" name="firstname" placeholder="First Name" data-error="First name required" required>
									<div class="help-block with-errors"></div>
				                </div>
			                </div>
				            <div class="form-group">
			                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
			                    <div class="col-md-9">
				                    <input type="text" id="lastname" class="form-control" name="lastname" placeholder="Last Name" data-error="Last name required" required>
									<div class="help-block with-errors"></div>
				                </div>
				            </div>

			                <div class="form-group">
			                    <label for="email" class="col-md-3 control-label">Email</label>
			                    <div class="col-md-9">
			                    	<div id="emailDiv">
			                      	<input type="email" id="email" class="form-control" name="email" placeholder="Email Address" onkeyup="checkEmail();" data-error="Invalid email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}" required></div>
			                      	<div class="help-block with-errors"></div>
			                      	<div id="emailErr" class="text-danger hidden">Email already in use</div>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="password" class="col-md-3 control-label">Password</label>
			                    <div class="col-md-9">
			                      	<input type="password" data-minlength="6" id="password" class="form-control" name="password" placeholder="Password" required>
			                      	<div class="help-block">Password should be at least 6 characters</div>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="confirmPassword" class="col-md-3 control-label">Confirm password</label>
			                    <div class="col-md-9">
			                      	<input type="password" id="confirmPassword" class="form-control" name="confirmPassword" placeholder="Confirm password" data-error="Please confirm password" data-match="#password" data-match-error="Passwords do not match" required>
			                      	<div class="help-block with-errors"></div>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="birthday" class="col-md-3 control-label">Birthday</label>
			                    <div class="col-md-9">
									<input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text" data-error="Birthday required" required>
			                      	<div class="help-block with-errors"></div>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="sex" class="col-md-3 control-label">Sex</label>
			                    <div class="col-md-9">
			                      	<div class="radio">
			                    		<label>	
											<input type="radio" class="form-horizontal" name="sex" value="M" required> M
										</label>
									</div>
									<div class="radio">
										<label>
			                      			<input type="radio" class="form-horizontal" name="sex" value="F" required> F
			                      		</label>
			                      	</div>
			                    </div>
			                </div>

			                <div class="form-group">                       
			                    <div class="col-md-offset-3 col-md-9">
			                      <input id="submit" type="submit" name="submit" class="btn btn-info" value="Sign Up"> 
			                    </div>
			                </div>                      
						</form>
		          	</div>
		        </div>
	        </div>
	    </div>
	    <br><br>
	    <?php include("footer.php") ?>
	</body>
</html>