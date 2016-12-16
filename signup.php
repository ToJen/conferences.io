<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <title>Signup to MUN Conferences</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- <link rel="stylesheet" href="css/styles.css"> -->
	</head>
	<body>
    <div class="container">    
   
        <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
	          <div class="panel panel-info">
	            <div class="panel-heading">
	                <div class="panel-title">Sign Up</div>
	                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="signin.html">Already have an account? Sign In</a></div>
	            </div>  
	            <div class="panel-body" >
	              <form id="signupform" class="form-horizontal" role="form">
	                <div id="signupalert" style="display:none" class="alert alert-danger">
	                    <p>Error:</p>
	                    <span></span>
	                </div>
	                                              
	                <div class="form-group">
	                    <label for="email" class="col-md-3 control-label">Email</label>
	                    <div class="col-md-9">
	                      <input type="text" class="form-control" name="email" placeholder="Email Address" required>
	                    </div>
	                </div>
	                    
	                <div class="form-group">
	                    <label for="firstname" class="col-md-3 control-label">First Name</label>
	                    <div class="col-md-9">
	                      <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
	                    <div class="col-md-9">
	                      <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="password" class="col-md-3 control-label">Password</label>
	                    <div class="col-md-9">
	                      <input type="password" class="form-control" name="passwd" placeholder="Password" required>
	                    </div>
	                </div>
	                    
	                <div class="form-group">
	                    <label for="icode" class="col-md-3 control-label">Invitation Code</label>
	                    <div class="col-md-9">
	                      <input type="text" class="form-control" name="icode" placeholder="" required>
	                    </div>
	                </div>

	                <div class="form-group">
	                    <!-- Button -->                                        
	                    <div class="col-md-offset-3 col-md-9">
	                      <button id="btn-signup" type="button" class="btn btn-info">
	                      	<i class="icon-hand-right"></i>&nbsp Sign Up
	                     	</button> 
	                    </div>
	                </div>                      
	              </form>

	          </div>
	        </div>
        </div> 

    </div>	<!-- .container --> 

    <div class="container">
    	<hr>
    	<!-- FOOTER -->
    	<footer class="footer">
    	  <p class="pull-right"><a href="#">Back to top</a></p>
    	  <p>&copy; 2016 MUN Conferences. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    	</footer>
    </div>
    
	</body>
</html>