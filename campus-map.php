<!DOCTYPE html>
<html>
  <head>
    <title>Explore the campus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <style>	 
      .captions { display: none;}
    </style>
  </head>
  <body>

    <?php include('header.php'); ?>

    <div class="container">
    	<br><br>
      <h2>Places on St. John's Campus</h2>
      <p>Here's some quick info about places on the St. John's campus.</p><br>
      <!-- <hr> -->

      <!-- Captions for Images -->
      <!-- <p class="captions" id ="library">Hours of the library can be found <a href="">here</a></p>
      <p class="captions" id ="gym">Hours of the Field House can be found <a href="">here</a></p>
      <p class="captions" id ="inco">
        “The greatest mistake you can make in life is to be continually fearing you will make one.”
      </p>
      <p class="captions" id ="uc">
        “The greatest mistake you can make in life is to be continually fearing you will make one.”
      </p>
      <p class="captions" id ="hsci">
        “The greatest mistake you can make in life is to be continually fearing you will make one.”
      </p>
      <p class="captions" id ="hatcher">
        “The greatest mistake you can make in life is to be continually fearing you will make one.”
      </p> -->

      <!-- Images to be displayed-->
      <div class="row">
        <!-- <div class="col-lg-2 col-sm" -->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <a class="thumbnail" title="Bruneau Centre" href="#" data-toggle="modal" data-title="Bruneau Centre for Innovation and Research" data-caption="This is where conferences will be held" data-target="#imgModal" data-image="imgs/inco.jpg" data-image-id="">
            <img class="img-responsive" src="imgs/inco.jpg">
          </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <a class="thumbnail" title="QE II Library" href="#" data-toggle="modal" data-title="Queen Elizabeth II Library" data-caption="#library" data-target="#imgModal" data-image="imgs/qe2-library.jpg" data-image-id="">
            <img class="img-responsive" src="imgs/qe2-library.jpg">
          </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <a class="thumbnail" title="The Works" href="#" data-toggle="modal" data-title="The Works Field House" data-caption="Hours of the Field House can be found here:" data-target="#imgModal" data-image="imgs/field-house.jpg" data-image-id="">
            <img class="img-responsive" src="imgs/field-house.jpg">
          </a>
        </div>
      <!--/div-->  <!-- .row -->

      <!--div class="row"-->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <a class="thumbnail" title="University Center" href="#" data-toggle="modal" data-title="University Center" data-caption="" data-image="imgs/uc.jpg" data-target="#imgModal" data-image-id="">
            <img class="img-responsive" src="imgs/uc.jpg">
          </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <a class="thumbnail" title="Health Science" href="#" data-toggle="modal" data-title="Health Science" data-caption="" data-target="#imgModal" data-image="imgs/health-science.jpg" data-image-id="">
            <img class="img-responsive" src="imgs/health-science.jpg">
          </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <a class="thumbnail" title="Hatcher House" href="#" data-toggle="modal" data-title="Hatcher House" data-caption="" data-target="#imgModal" data-image="imgs/hatcher.jpg" data-image-id="">
            <img class="img-responsive" src="imgs/hatcher.jpg">
          </a>
        </div>
      </div>  <!-- .row -->


      <!-- Modal for Image Gallery -->
      <div class="modal fade" id="imgModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <div class="modal-header"> 
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times</span>
              </button>
              <h4 class="modal-title" id="imgLabel"></h4> 
            </div> <!-- .modal-header -->

            <div class="modal-body">
              <img class="img-responsive" id="imgDisplay" src="">
            </div> <!-- .modal-body   -->

            <div class="modal-footer">
              <div class="col-md-2 col-sm-2 col-xs-3">
                <button type="button" class="btn btn-primary" id="previous">Previous</button>
              </div>
              <div class="col-md-8 col-sm-8 col-xs-6 text-justify" id="imgCaption"></div>
              <div class="col-md-2 col-sm-2 col-xs-3">
                <button type="button" class="btn btn-primary" id="next">Next</button>
              </div>
            </div> <!-- .modal-footer -->

          </div>  <!-- .modal-content -->
        </div>    <!-- .modal-dialog  --> 
      </div>      <!-- .modal-fade    -->

      <hr>

      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-offest-2">
            <h2>View the Map</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          </div>
        </div>
        <!-- <br>
        <a class="btn btn-default" href="http://www.myatlascms.com/map/index.php?id=219" target="blank">Interactive Campus Map</a>
        <br><br>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="http://www.myatlascms.com/map/index.php?id=219"></iframe>
        </div>
        <br><br>
        <div id="map" style="width:100%;height:500px"></div> --> <!-- Google Maps, map focused on campus-->
        <!-- <hr> -->

        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#map">Google Map</a></li>
          <li><a data-toggle="tab" href="#interactive-map">Interactive Map</a></li>
        </ul>

        <div class="tab-content"> 
          <div id="map" class="tab-pane fade in active" style="width:100%;height:500px"></div> <!-- Google Maps-->
          <div id="interactive-map" class="embed-responsive embed-responsive-4by3 tab-pane fade" style="width:100%;height:500px">
            <iframe class="embed-responsive-item" src="http://www.myatlascms.com/map/index.php?id=219"></iframe>
          </div>
        </div>

      </div>

      <hr>

      <!-- FOOTER -->
      <footer class="footer">
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2016 MUN Conferences. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    </div>

    <script src="js/gallery.js"></script>
    <script src="js/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtSvVwwRSC4oDn1lnVLxYjMFVnxFtn8Q0&callback=initMap"
    async defer></script>
  </body>
</html>