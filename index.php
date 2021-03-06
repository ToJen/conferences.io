<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>Welcome to MUN Conferences</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>
			.backToTop {
				cursor: pointer;
				position: fixed;
				bottom: 20px;
				right: 20px;
				display: none;
        background-color: #00B398;
        border-color: #069b85;
        opacity: 0.7;
			}
			.backToTop:hover, .backToTop:focus, .backToTop:active , .backToTop:active:focus{
				color: #00B398;
        background-color: #fff;
        border-color: #069b85;
        opacity: 1.0;
			}

			.footer a {
				color: #fff;
			}
		</style>
	</head> 

	<body>

		<?php include('header.php'); ?>


		<!-- Begin page content -->

		<!-- Main Carousel -->
		<p id="top"></p>
		<div id="mainCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
						<li data-target="#mainCarousel" data-slide-to="0" class ="active"></li>
						<li data-target="#mainCarousel" data-slide-to="1"></li>
						<li data-target="#mainCarousel" data-slide-to="2"></li>
						<li data-target="#mainCarousel" data-slide-to="3"></li>
				</ol>

				<!-- Wrapper class for slides -->
				<div class="carousel-inner" role="listbox">
						<div class="item active">
								<img src="imgs/three.jpg" alt="blah" style="height: 500px; width:1600px">
								<div class="carousel-caption">
										<h3>blah</h3>
										<p>lorem ipsum dolor sit</p>
								</div>
						</div>

						<div class="item">
								<img src="imgs/four.jpg" alt="blah" style="height: 500px; width:1600px">
								<div class="carousel-caption">
										<h3>blah</h3>
										<p>lorem ipsum dolor sit</p>
								</div>
						</div>

						<div class="item">
								<img src="imgs/one.jpg" alt="blah" style="height: 500px; width:1600px">
								<div class="carousel-caption">
										<h3>blah</h3>
										<p>lorem ipsum dolor sit</p>
								</div>
						</div>

						<div class="item">
								<img src="imgs/two.jpg" alt="blah" style="height: 500px; width:1600px">
								<div class="carousel-caption">
										<h3>blah</h3>
										<p>lorem ipsum dolor sit</p>
								</div>
						</div>
				</div>	<!-- .carousel-inner -->

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#mainCarousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#mainCarousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
				</a>
		</div>    <!-- .carousel -->

		<br><br>

		<div class="container marketing">

			<!-- Three columns of text below the carousel -->
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<img class="img-circle" src="http://placehold.it/140x140" alt="Generic placeholder image">
					<h2>Heading</h2>
					<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
					<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
				</div><!-- .col-lg-4 .col-md-4 -->
				<div class="col-lg-4 col-md-4">
					<img class="img-circle" src="http://placehold.it/140x140" alt="Generic placeholder image">
					<h2>Heading</h2>
					<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
					<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
				</div><!-- .col-lg-4 .col-md-4 -->
				<div class="col-lg-4 col-md-4">
					<img class="img-circle" src="http://placehold.it/140x140" alt="Generic placeholder image">
					<h2>Heading</h2>
					<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
					<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
				</div><!-- .col-lg-4 .col-md-4 -->
			</div><!-- .row -->


			<!-- START THE FEATURETTES -->

			<hr class="featurette-divider">

			<div class="row featurette">
				<div class="col-md-7">
					<h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
					<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
				</div>
				<div class="col-md-5">
					<img class="featurette-image img-responsive center-block" src="http://placehold.it/300x300" alt="Generic placeholder image">
				</div>
			</div>

			<hr class="featurette-divider">

			<div class="row featurette">
				<div class="col-md-7 col-md-push-5">
					<h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
					<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
				</div>
				<div class="col-md-5 col-md-pull-7">
					<img class="featurette-image img-responsive center-block" src="http://placehold.it/300x300" alt="Generic placeholder image">
				</div>
			</div>

			<hr class="featurette-divider">

			<div class="row featurette">
				<div class="col-md-7">
					<h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
					<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
				</div>
				<div class="col-md-5">
					<img class="featurette-image img-responsive center-block" src="http://placehold.it/300x300" alt="Generic placeholder image">
				</div>
			</div>

			<p class="pull-right"><a href="#" id="backToTop" class="btn btn-primary btn-lg backToTop" role="button">
				<span class="glyphicon glyphicon-chevron-up"></span></a></p>
		
		</div>	<!-- .container -->    

		<!-- FOOTER -->
		<br><br>
		<?php include("footer.php") ?>

		<script>
			// for scroll to top button
			$(window).scroll(function() {
				if ($(this).scrollTop() > 50) 
					$("#backToTop").fadeIn();
				else
					$("#backToTop").fadeOut();
			});

			$("#backToTop").click(function() {
			  $("html, body").animate({scrollTop: 10}, 800);
			  return false;
			});
		</script>		        

	</body>
</html>