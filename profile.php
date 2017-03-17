<?php
	// start session
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <title>My Profile - MUN Conferences</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
		<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<script type="text/javascript" src="js/email.js"></script>
		<script type="text/javascript" src="js/datepicker.js"></script>
		<style>
			.panel 
			{
				border-color: #white;
				width: 100%;
			}
			.panel > .panel-heading 
			{
				background-color: #00B398;
				border-color: white;
				color: white;
				font-weight: bold;
			}

			.panel > .panel-body > a 
			{
				color: #00B398;
			}
			
			.fa 
			{
				padding-left: 0.25em;
				padding-right: 0.25em;
			}

			/* Stick to original logo colors */
			.fa-facebook
			{
				color: #3b5998;
			}

			.fa-twitter
			{
				color: #00a0d1;
			}

			.fa-linkedin
			{
				color: #4875B4;
			}

			.fa-instagram
			{
				color: #4E433C;
			}

			.fa-google-plus
			{
				color: #C63D2D;
			}

			/* Smart phones */
			@media only screen and (max-width: 480px)
			{
			   .fa { font-size: 2em; }
			}

			/* Tablets */
			@media only screen and (min-width: 481px) and (max-width: 1024px)
			{
			   .fa { font-size: 3em; }
			}

			/* Laptops or desktops */
			@media only screen and (min-width: 1025px)
			{
			   .fa { font-size: 3.5em; }
			}
		</style>
	</head>

	<body>
	    <?php include("header.php") ?>		
		<br>
	    <br>
        <div class="row" style="background-color: #00B398;">
        	<div class="col-xs-12 text-center">
        		<img class="img-circle" style="margin-top: 30px; border: 4px solid white; background: white;" src="imgs/profile.png" width="100px" height="100px">
        		<h4 style="color: white;">John Doe</h4>
        		<h5 style="color: white;">(Username)</h3>
        	</div>
        </div>

        <div class="row">
	        <div class="col-xs-12 text-center">
        		<div class="h4" style="color: #00B398;"><b>Software Developer</b></div>
        		<div class="h5">Memorial University of Newfoundland, Conferences Office</div>
		    </div>
	    </div>
	    <br>

        <div class="row">
	        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
	        	<div class="panel">
		        	<div class="panel-heading">Description</div>
	        		<div class="panel-body text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non suscipit mi, non dapibus lectus. Maecenas ullamcorper consequat venenatis. Maecenas sollicitudin arcu risus, et feugiat lorem laoreet a. Ut pellentesque lorem orci, eu imperdiet arcu ultricies et. Morbi ultrices faucibus lorem, eu convallis dolor pharetra et.</div>
		    	</div>
	    	</div>
	    </div>

	    <div class="row">
	        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
	        	<div class="panel">
	        		<div class="panel-heading">Birthday</div>
	        		<div class="panel-body">DD/MM/YYYY</div>
        		</div>
        	</div>
	    </div>

	    <div class="row">
	    	<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
	        	<div class="panel">
	        		<div class="panel-heading">Address</div>
	        		<div class="panel-body">No address available</div>
        		</div>
		    </div>
	    </div>

	    <div class="row">
	        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
	        	<div class="panel">
	        		<div class="panel-heading">Email</div>
	        		<div class="panel-body"><a href="mailto:jdoe@email.ca">jdoe@email.ca</a></div>
        		</div>
        	</div>
	    </div>

	    <div class="row">
	   		<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
	        	<div class="panel">
	        		<div class="panel-heading">Phone number</div>
	        		<div class="panel-body">(XXX) XXX-XXXX</div>
        		</div>
		    </div>
	    </div>

	    <div class="row">
	   		<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
	   			<div class="panel">
	        		<div class="panel-heading">Social media</div>
	        		<div class="panel-body text-center">
			    		<a href="#"><i class="fa fa-linkedin"></i></a>
			    		<a href="#"><i class="fa fa-facebook"></i></a>
			    		<a href="#"><i class="fa fa-twitter"></i></a>
			    		<a href="#"><i class="fa fa-instagram"></i></a>
			    		<a href="#"><i class="fa fa-google-plus"></i></a>
		    		</div>
		    	</div>
		    </div>
	    </div>

	    <br>
	    <br>
	    <?php include("footer.php") ?>
	</body>
</html>