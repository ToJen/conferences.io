<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <title>Sign In - MUN Conferences</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
        <?php include('header.php'); ?>
        <br>
        <br>

        <div class="container"> 
            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                <?php 
                    if($_GET["regSuccess"])
                        echo "<div class=\"alert alert-success text-center\"><strong>Registration successful!</strong> You may now sign in.</div>";

                    if($_GET["loginError"]) 
                    	echo "<div class=\"alert alert-danger text-center\">Invalid username or password!</div>";
                ?>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px">
                            <a href="#">Need help signing in?</a>
                        </div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body">
                        <form id="loginform" action="login.php" method="post" class="form-horizontal" role="form">
                            <div style="margin-bottom: 25px" class="input-group">
            	               <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            	               <input id="username" type="text" class="form-control" name="username" value="" placeholder="username or email" required>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
            	               <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            	               <input id="password" type="password" class="form-control" name="password" placeholder="password" required>
                            </div>
            	                          
                            <div class="input-group">
                                <div class="checkbox">
                                    <label>
                                        <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                    </label>
                                </div>
                            </div>

                            <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                                <div class="col-sm-12 controls">
                                    <input id="submit" type="submit" name="submit" value="Login" class="btn btn-success">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 control">
                                    <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">Don't have an account?
                                        <a href="signup.php">Sign up here</a>
                                    </div>
                                </div>
                            </div>    
            	    	</form>
            	    </div>                     
                </div>  
        	</div>
        </div>

        <br><br><br><br>
        <?php include("footer.php") ?>

    
	</body>
</html>