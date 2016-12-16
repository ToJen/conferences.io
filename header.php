<?php
	
	// $parent;	// the grand parent li element whose class is a dropdown
	function echoActiveClass($requestURI, $elem) {
		$curr = basename($_SERVER['REQUEST_URI'], ".php");
		if($curr == $requestURI) {
			echo 'class="active"';

			/*$parent = $elem->parentNode;
			while($parent->tagName != "li") {
				$parent = $parent->parentNode;
			}
			// $sibling = $parent->getPreviousSibling;
			$class = $parent->getAttribute("class");	// get any existing classes
			$parent->setAttribute('class', $class . " active");*/
		}
	}
	
?>

<style>
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a {
    background-color: #00B398;
  }
</style>

<!-- Navigation Bar -->
<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
				<div class="navbar-header">
						<span class="pull-left navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="margin-left: 10px"><i class="glyphicon glyphicon-menu-hamburger"></i></span>
						<a class="navbar-brand" href="#">MUN Conferences App</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav">
								<li <?=echoActiveClass("index") ?> ><a href="index.php">Home</a></li>
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">Explore
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu">
										<li <?=echoActiveClass("campus-map", $this) ?> ><a href="campus-map.php">Campus</a></li>
										<li><a href="#">City</a></li>
									</ul>
								</li>
								<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#">Event Details
												<span class="caret"></span>
										</a>
										<ul class="dropdown-menu">
												<li <?=echoActiveClass("event-info") ?> ><a href="event-info.php">About</a></li>
												<li <?=echoActiveClass("attendees") ?> ><a href="attendees.php">Guests</a></li>
												<li <?=echoActiveClass("sponsors") ?> ><a href="sponsors.php">Sponsors</a></li>
										</ul>
								</li>
						</ul>
						<ul class="nav navbar-nav navbar-right" id="userAccess">
								<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
								<li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
						</ul>
				</div>
		</div>
</nav>